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

<br>
<br>
<br>

# 🔑 Modificadores en PHP OOP

## 1. **public**

* Accesible **desde cualquier parte**: dentro de la clase, desde fuera, desde clases hijas.
* Es el modificador más abierto.

```php
class Nave {
    public $nombre = "Enterprise";
}

$n = new Nave();
echo $n->nombre; // ✅ funciona
```

## 2. **private**

* Accesible **solo dentro de la clase donde está declarado**.
* Ni siquiera las clases hijas pueden acceder.

```php
class Nave {
    private $combustible = "Antimateria";
}

$n = new Nave();
echo $n->combustible; // ❌ ERROR (no se puede acceder desde fuera)
```

## 3. **protected**

* Accesible **dentro de la clase y sus hijas (herencia)**.
* No se puede acceder directamente desde fuera.

```php
class Nave {
    protected $tipo = "Exploración";
}

class SubNave extends Nave {
    public function mostrarTipo() {
        return $this->tipo; // ✅ accesible desde clase hija
    }
}

$s = new SubNave();
echo $s->mostrarTipo(); // "Exploración"
```

## 4. **static**

* La propiedad o método pertenece a la **clase**, no a la instancia.
* No necesitas crear un objeto para usarlo.

```php
class Nave {
    public static $contador = 0;

    public static function aumentar() {
        self::$contador++;
    }
}

Nave::aumentar();
echo Nave::$contador; // 1
```

✔️ Se accede con `Clase::propiedad` o `Clase::metodo()`.
✔️ Dentro de la clase, se usa `self::`.

---

## 5. **final** (extra importante)

* Si lo pones en una **clase**, **no puede heredarse**.
* Si lo pones en un **método**, ese método no puede ser sobreescrito en clases hijas.

```php
final class Nave { } // No se puede extender

class Base {
    final public function despegar() { }
}

class Sub extends Base {
    public function despegar() { } // ❌ ERROR
}
```

## 6. **abstract**

* Se usa en clases y métodos.
* Una **clase abstracta** no se puede instanciar, solo heredar.
* Un **método abstracto** obliga a las clases hijas a implementarlo.

```php
abstract class Nave {
    abstract public function despegar();
}

class NaveEspacial extends Nave {
    public function despegar() {
        echo "Despegando 🚀";
    }
}
```

# 📝 Resumen rápido (modo chuleta)

| Modificador   | Acceso / Uso                                  |
| ------------- | --------------------------------------------- |
| **public**    | Desde cualquier parte                         |
| **private**   | Solo dentro de la clase                       |
| **protected** | Clase + hijas                                 |
| **static**    | Pertenece a la clase, no al objeto            |
| **final**     | Clase no heredable / método no sobrescribible |
| **abstract**  | Clases incompletas, deben heredarse           |

## 🔹 `is` y `as` (C#) vs PHP

En PHP no existen directamente `is` y `as` como en C#, pero hay equivalentes.

### En **C#**

```csharp
if (obj is Nave) {
    Nave nave = obj as Nave;
}
```

* `is` → comprueba si un objeto es de cierto tipo.
* `as` → intenta convertir el objeto (si no puede, devuelve `null`).

### En **PHP**

#### 1. Equivalente a `is` → `instanceof`

```php
if ($obj instanceof Nave) {
    echo "Es una Nave 🚀";
}
```

#### 2. Equivalente a `as` → *casting* y *type hinting*

```php
// Casting de tipos escalares
$numero = "123";
$numero = (int) $numero; // ahora es 123 como int

// Type hinting en funciones
function despegar(Nave $n) {
    echo "La nave {$n->getNombre()} despega!";
}
```

✔️ Si le pasas algo que no sea una `Nave`, PHP lanza error.


## 📌 Resumen `is` vs `as`

| Lenguaje | `is`                            | `as`                                                          |
| -------- | ------------------------------- | ------------------------------------------------------------- |
| **C#**   | Comprueba tipo (`obj is Clase`) | Convierte/castea (`obj as Clase`)                             |
| **PHP**  | `instanceof`                    | No existe `as`. Se usan **casts** `(tipo)` o **type hinting** |

