# Arrays - PHP

### 🔹 **Creación y verificación**

- `array()` → Crea un array.
- `[]` → Sintaxis corta para crear arrays.
- `is_array($var)` → Verifica si una variable es un array.
- `count($array)` → Devuelve el número de elementos.
- `in_array($valor, $array)` → Verifica si un valor existe en el array.
- `array_key_exists($clave, $array)` → Verifica si una clave existe.

---

### 🔹 **Acceso a claves y valores**

- `array_keys($array)` → Devuelve todas las claves.
- `array_values($array)` → Devuelve todos los valores.
- `array_flip($array)` → Intercambia claves y valores.

---

### 🔹 **Añadir, eliminar, modificar**

- `array_push($array, $valor1, $valor2, ...)` → Agrega al final.
- `array_pop($array)` → Elimina el último elemento.
- `array_unshift($array, $valor1, ...)` → Agrega al inicio.
- `array_shift($array)` → Elimina el primer elemento.
- `unset($array[$clave])` → Elimina un elemento específico.

---

### 🔹 **Ordenamiento**

- `sort($array)` → Ordena valores de menor a mayor.
- `rsort($array)` → Ordena valores de mayor a menor.
- `asort($array)` → Ordena valores manteniendo claves.
- `arsort($array)` → Ordena valores descendente manteniendo claves.
- `ksort($array)` → Ordena por claves.
- `krsort($array)` → Ordena por claves en orden inverso.

---

### 🔹 **Búsqueda**

- `array_search($valor, $array)` → Devuelve la clave del valor.
- `in_array($valor, $array)` → Verifica si existe.

---

### 🔹 **Manipulación avanzada**

- `array_merge($arr1, $arr2)` → Une arrays.
- `array_slice($array, $inicio, $longitud)` → Extrae una parte.
- `array_splice($array, $inicio, $longitud, $reemplazo)` → Elimina/reemplaza elementos.
- `array_unique($array)` → Elimina duplicados.
- `array_reverse($array)` → Invierte el orden.
- `array_fill($inicio, $n, $valor)` → Rellena con valores.
- `range($inicio, $fin, $paso)` → Crea un array de rango.

---

### 🔹 **Funciones con callbacks**

- `array_map($func, $array)` → Aplica una función a cada elemento.
- `array_filter($array, $func)` → Filtra elementos según condición.
- `array_reduce($array, $func, $valor_inicial)` → Reduce un array a un valor único.
- `array_walk($array, $func)` → Aplica una función a cada elemento (con clave).

---

👉 En la práctica, las **más usadas** en el día a día suelen ser:

`count()`, `in_array()`, `array_push()`, `array_pop()`, `sort()`, `array_merge()`, `array_slice()`, `array_map()`, `array_filter()`.