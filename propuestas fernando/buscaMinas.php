<?php
// ------------- Juego del buscaminas ------------- //

// Crear el tablero
$filas = 5;
$minas = rand(2,5);
function generarTablero($filas, $minas, &$tablero): Array {
    $tablero = array_fill(0, $filas, $minas);
    $tablero = array_merge($tablero, $tablero);
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
        for ($j = 0; $j < $filas; $j++) {
            echo $tableroJuego[$i][$j] . " ";
        }
        echo "<br>";
    }

}

jugar();


