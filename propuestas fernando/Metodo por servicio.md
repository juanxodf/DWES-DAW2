## 📌 Apuntes sobre juegos en PHP con servicios

### 1. Concepto básico

* Un **juego en PHP** puede funcionar en dos capas:

  * **Frontend (HTML/JS):** donde se muestran las pantallas del juego.
  * **Backend (PHP):** expone servicios que reciben peticiones (GET/POST) y devuelven información (JSON, texto, números, etc.).

Ejemplo:
Un juego de adivinar un número → el frontend pide al backend un número secreto y luego envía intentos para validar.

### 2. Acceso por URL (estilo REST)

Se aprovecha `$_SERVER['REQUEST_URI']` para leer qué recurso pide el jugador.

```php
$parametros = explode("/", $_SERVER['REQUEST_URI']);
unset($parametros[0]); // Elimina posición vacía por la primera "/"
```

Ejemplo de URL:

```
http://localhost/juego.php/adivinar/5
```

`$parametros` quedaría así:

```
[1] => "adivinar"
[2] => "5"
```

### 3. Manejo de métodos HTTP

* **GET:** pedir datos (ej: obtener número aleatorio, estado de partida).
* **POST:** enviar datos (ej: registrar intento, guardar puntuación).
* **PUT / DELETE:** se usan menos en juegos, pero sirven para actualizar o borrar.

```php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    // devolver datos
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // procesar jugada
}
```

### 4. Funciones en librería

La lógica del juego conviene ponerla en un archivo aparte (`libreria.php`):

```php
<?php
function bisiesto($anio) {
    return ($anio % 4 == 0 && ($anio % 100 != 0 || $anio % 400 == 0))
        ? "Es bisiesto"
        : "No es bisiesto";
}
?>
```

Y se invoca según el parámetro recibido.


### 5. Ejemplo ampliado: juego “Adivina el número”

**libreria.php**

```php
<?php
function generarNumero() {
    return rand(1, 10); // número secreto
}

function verificarIntento($intento, $numero) {
    if ($intento == $numero) return "¡Correcto!";
    return ($intento < $numero) ? "Muy bajo" : "Muy alto";
}
?>
```

**juego.php**

```php
<?php
include("libreria.php");

$parametros = explode("/", $_SERVER['REQUEST_URI']);
unset($parametros[0]);

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if ($parametros[1] == "numero") {
        echo generarNumero();
    }
    if ($parametros[1] == "intento" && isset($parametros[2]) && isset($parametros[3])) {
        echo verificarIntento($parametros[2], $parametros[3]);
    }
}
?>
```

* URL `http://localhost/juego.php/numero` → devuelve número secreto.
* URL `http://localhost/juego.php/intento/5/7` → compara 5 contra 7.

### 6. Recomendación: devolver JSON

Así el frontend con JS puede manejar los datos más fácil:

```php
header('Content-Type: application/json');
echo json_encode([
    "resultado" => verificarIntento($parametros[2], $parametros[3])
]);
```
✅ Con esto puedes ir montando tus juegos: cada acción del jugador es una petición al **servicio PHP** que responde con el estado del juego.
