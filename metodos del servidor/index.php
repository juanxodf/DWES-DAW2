<?php
include("libreria.php");
$parametros = explode("/", $_SERVER['REQUEST_URI']);
unset($parametros[0]);
print_r($parametros);
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if ($parametros[1] == "bisiesto") {
        echo bisiesto($parametros[1]);
    }
}