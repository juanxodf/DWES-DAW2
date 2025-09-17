<?php
// digamos que el require es un copia pega de codigo de un archivo a otro
// por eso si se incluye varias veces da error
// para evitar eso se usa require_once
require_once 'nave.php';

class Factoria {
    public static function generaAlumno(){
        $nombres = ['Enterprise', 'Defiant', 'Voyager', 'Discovery', 'Galactica'];
        $tipos = ['Pasajeros', 'Mercancias', 'Exploracion', 'Combate'];
        $combustibles = ['Antimateria', 'Ionico', 'Nuclear', 'Solar', 'Combustible Fósil'];
        $na = new Nave(
            nom: $nombres[array_rand($nombres)],
            tc: $tipos[array_rand($tipos)],
            co: $combustibles[array_rand($combustibles)]
        );
        return $na;

    }
}