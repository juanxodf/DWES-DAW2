<?php
/*
    include libreria.php;

   // Declarar variables 
    $num = 32;

    $num = 'A'; // Para caracteres y cadenas utilizaremos comillas simples

    $num = true;

    // Sintaxis del for 
    for ($i=0 ; $i < 10 ; $i++   ) {
        echo $i;
    }
    
    // No la utilizaremos cuando veamos servidor
    // sirve para agregar un salto de linea 
    echo '<br>';

    // la etiqueta echo sirve para llamar a una variable 
    // y mostrarla 
    echo $num;

    // Para declarar los arrays
    $v = [];
    $v[] = 22; 

    $v = range(1,10);

    // para leer el array
    print_r($v);

    // Utilizaremos este foreach para recorrer los vectores
    foreach ($v as $key => $value) {
        echo $key.' -> '.$value;
    }

    // Numeros aleatorios
    $alea = rand(1,100);

    $va = 23;

    echo multiplica($va);

    $xa = 5;

    echo multiplica2($xa);

    $ve = range(1,5);

    print_r($ve);
    echo '<br>';
    add($ve,'a');

    print_r($ve);

*/
    $personas = [
        '1A' => 'Carlos',
        '2B' => 'María',
        '3C' => [
            'Nombre' => 'Lucia',
            'Curso' => '1AFI'
        ]
    ];

    echo($personas['2B']);

    $personas['2B'] = 'Sara';

    print_r($personas);
?>
