# 📝 Chuletario POO en PHP (con ejemplos de Naves 🚀)

## 🔹 Incluir archivos

* `require 'archivo.php';` → incluye el archivo, si no existe → error fatal.
* `require_once 'archivo.php';` → lo mismo, pero evita incluirlo más de una vez.
* Se usa para **importar clases** que vas a necesitar.

Ejemplo:

```php
require_once 'nave.php';
require 'factorias.php';
```


## 🔹 Crear objetos

```php
$n = new Nave('Enterprise', 'Mercancias', 'Antimateria');
```

✔️ Crea una instancia de la clase `Nave`.
✔️ Se ejecuta el `__construct()` que recibe parámetros.
---

## 🔹 Métodos mágicos

* `__construct()` → inicializa el objeto al crearlo.
* `__toString()` → define cómo se imprime el objeto.

  ```php
  echo $n; // llama a __toString()
  ```
* `__call($nombre, $args)` → se ejecuta si intentas llamar a un método que **no existe**.
* `__callStatic()` → igual, pero para métodos estáticos.


## 🔹 Getters y Setters

Sirven para acceder y modificar atributos privados:

```php
$n->setNombre('Defiant');
echo $n->getNombre();
```

✔️ Protege el acceso directo a las propiedades.


## 🔹 Métodos estáticos

* Se llaman sin crear un objeto.
* Se usan cuando no necesitas una instancia, solo lógica.

```php
Factoria::generaAlumno();   // devuelve una Nave aleatoria
Nave::metodoEstatico();     // imprime "Metodo estatico"
```

## 🔹 Builder (Patrón de diseño)

Es una forma de **construir objetos paso a paso**.
En lugar de pasar todos los parámetros en el constructor, se van “seteando” y al final se llama a `build()`.

Ejemplo:

```php
$nav2 = Nave::Builder()
            ->setCombustible('Ionico')
            ->setNombre('Voyager')
            ->build();

$nav3 = Nave::Builder()
            ->setNombre('Journey')
            ->build();
```

✔️ `$nav2` y `$nav3` son **objetos `Nave`**, construidos desde un objeto auxiliar (`BuilderNave`).
✔️ Puedes usar valores por defecto si no defines todo.


## 🔹 Ejemplo completo (tu main.php)

```php
require_once 'nave.php';
require 'factorias.php';

// Crear nave normal con constructor
$n = new Nave('Enterprise', 'Mercancias', 'Antimateria');
echo $n.'<br>';

$n->setNombre('Defiant');
echo $n.'<br>';

// Crear nave aleatoria con la factoría
Factoria::generaAlumno();

// Crear nave con Builder
$nav2 = Nave::Builder()->setCombustible('Ionico')->setNombre('Voyager')->build();
$nav3 = Nave::Builder()->setNombre('Journey')->build();
echo $nav2.'<br>'.$nav3.'<br>';

// Usar Builder paso a paso
$navJuan = Nave::Builder();
$navJuan->setNombre('Juanito');
$navJuan->setCombustible('Nuclear');
$navJuan = $navJuan->build();
echo $navJuan;
```

---

## 📌 Ideas clave que debes recordar

1. **Clases** → definen atributos (propiedades) y comportamientos (métodos).
2. **Objetos** → son instancias de clases.
3. **Encapsulación** → se usan `private` + getters/setters para proteger datos.
4. **Métodos mágicos** → añaden “atajos” o comportamientos especiales (`__toString`, `__call`, etc.).
5. **Métodos estáticos** → se llaman con `Clase::metodo()`, sin necesidad de crear objetos.
6. **Builder** → facilita construir objetos complejos paso a paso.
7. **Factoría** → crea objetos de forma automatizada (ejemplo: naves aleatorias).
