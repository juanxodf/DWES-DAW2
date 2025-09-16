<?php

    function multiplica ($a){
        return $a * 3;
    }

    // si pasamos el valor pero le añadimos al valor un & 
    // y el valor cambia dentro de la función, tambien cambia 
    // el valor de la variable
    function multiplica2 (&$x){
        $x = 10;
        return $x * 3;
    }

    function add(&$ve, $ele){
        $ve[] = $ele;
    }