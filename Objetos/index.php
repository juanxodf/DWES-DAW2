<?php
// esto es para que no de error si se incluye varias veces
require_once 'nave.php';
require 'factorias.php';

$n = new Nave('Enterprise', 'Mercancias', 'Antimateria');

echo $n.'<br>';

$n -> setNombre('Defiant');
echo $n.'<br>';

// Solo se puede llamar a metodos que no existen/ son estaticos
Factoria::generaAlumno();

// Llamada a un metodo estatico
// se pone de esta forma porque no hace falta instanciar la clase y solo hace falta el nombre de la clase
$nav2 = Nave::Builder()->setCombustible('Ionico')->setNombre('Voyager')->build();
$nav3 = Nave::Builder()->setNombre('Journey')->build();
echo $nav2.'<br>'.$nav3.'<br>';

// Creamos una nave con el builder, pero solo con sus valores por defecto (es un objeto auxiliar por asi decirlo
// que nos ayuda a crear el objeto principal)
$navJuan = Nave::Builder();

// le agregamos el campo que queramos
$navJuan->setNombre('Juanito');
$navJuan->setCombustible('Nuclear');

// y luego la construimos
$navJuan = $navJuan->build();