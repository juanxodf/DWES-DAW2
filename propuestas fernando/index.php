<?php

$tablero = [];

function iniciarTablero(&$tab, $cant) {
    for($i=0; $i<$cant; $i++){
        $tab[] = '-';
    }
}

function toString($tab){
    $cadena = "";
    for( $i=0; $i<count($tab); $i++){
        $cadena .= $cadena. $tab[$i] . "x ";
    };
    return $cadena;
}



iniciarTablero($tablero, 10);

// es el print del tablero
echo toString($tablero);

// colocar la mosca en una posicion aleatoria
function colocarMosca(&$tablero){
    $posicionMosca = rand(0, count($tablero)-1);
    $tablero[$posicionMosca] = '*';
}

colocarMosca($tablero);

echo "<br>";

function darManotazo($tablero,$num){
    return $num;
}
    echo "<br>";
    echo "El jugador da un manotazo";
    echo "<br>";

    $manotazo = darManotazo($tablero, $num);

if($tablero[$manotazo] == '*'){
    echo "Has acertado en la posicion $manotazo";
    $matarMosca = false;
    // si acierta, la mosca muere y se termina el juego
} elseif (array_search('*', $tablero) == $manotazo-1 || array_search('*', $tablero) == $manotazo+1) {
    // array_search('*', $tablero) == $manotazo-1 || array_search('*', $tablero) == $manotazo+1
    // este codigo sirve para saber si la mosca esta en la posicion anterior o posterior al manotazo
    // si es asi, la mosca se mueve a una posicion aleatoria
    colocarMosca($tablero);
    echo "Casi le aciertas en la posicion $manotazo, la mosca se ha movido";

} 
else {
    echo "Has fallado en la posicion $manotazo";
}
echo "<br>";
echo toString($tablero);


echo $_SERVER['REQUEST_URI']."<br>";
echo $_SERVER['REQUEST_METHOD']."<br>";

$parametros = explode('/', $_SERVER['REQUEST_URI']);
print_r($parametros);
echo "<br>";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    if($parametros[1] == "iniciar"){
        iniciarTablero($tablero, 10);
        colocarMosca($tablero);
    }
    if($parametros[1] == "jugar"){
        echo(darManotazo($tablero,$parametros[2]));
    }
} else {
    echo "No es un metodo post";
}