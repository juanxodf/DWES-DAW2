<?php
// ------------- Juego del buscaminas ------------- //

// Crear el tablero
$filas = 9;
$minas = rand(2,5);
function generarTablero($filas, $minas, &$tablero): Array {
    for ($i = 0; $i < $filas; $i++) {
        $tablero[$i] = ['-'];
    }
    // Colocar minas en posiciones aleatorias
    $minasColocadas = 0;
    while ($minasColocadas < $minas) {
        $filaAleatoria = rand(0, $filas - 1);
        if ($tablero[$filaAleatoria] !== '*') {
            $tablero[$filaAleatoria] = '*';
            $minasColocadas++;
        }
    }
    return $tablero;
}
$tableroJuego = generarTablero($filas, $minas, $tablero);

function jugar(){
    global $tableroJuego, $filas;
    // Mostrar el tablero (para pruebas, en un juego real no se mostraría)
    for ($i = 0; $i < $filas; $i++) {
        echo $tableroJuego[$i] . " ";
        echo "<br>";
    }

}

jugar();


