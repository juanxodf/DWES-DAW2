## 📖 Explicación "simple" de la api

Imagina que tu aplicación es como una **oficina virtual** a la que se entra por una **puerta llamada login**. Desde ahí, hay diferentes “ventanas” que puedes abrir según lo que quieras hacer.

### 1. Entrar al sistema (login)

* Un usuario escribe su **nombre** y su **contraseña**.
* El sistema revisa en la base de datos si existe ese usuario.
* Si existe, devuelve un papelito (JSON) con su nombre, su id y si es **admin** o **jugador**.

👉 Ejemplo de respuesta:

```json
{
  "id": 2,
  "nombre": "juan",
  "rol": "jugador"
}
```


### 2. Crear un usuario nuevo

* Cualquiera puede registrarse.
* Solo se pide **nombre**, **contraseña** y **correo**.
* Por defecto, será **jugador**.


### 3. Qué diferencia a un **admin** de un **jugador**

* **Jugador**: puede jugar, crear partidas, golpear moscas, rendirse.
* **Admin**: además puede ver todos los usuarios, editarlos y borrarlos.


### 4. Crear una partida

* Cuando un usuario quiere empezar un juego, envía su `id_usuario`.
* El sistema crea un **tablero de 9 casillas** (como 9 espacios en una fila).
* En una de esas casillas se esconde la **mosca** (el sistema la pone aleatoriamente).
* El estado de la partida se marca como **en curso**.


### 5. Golpear la mosca

* El jugador elige una casilla (del 0 al 8).
* El sistema revisa si en esa casilla estaba la mosca.

  * Si sí → gana la partida.
  * Si no → sigue jugando y aumenta el contador de intentos.


### 6. Rendirse

* Si el jugador no quiere seguir, puede rendirse.
* La partida se marca como **perdida**.


### 7. Consultar el estado de la partida

* En cualquier momento, el jugador puede pedir ver cómo va la partida.
* Se devuelve:

  * El tablero (qué casillas se golpearon).
  * El número de intentos.
  * Si está **en curso**, **ganada** o **perdida**.
