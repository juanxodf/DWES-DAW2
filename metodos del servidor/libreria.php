<?php
function bisiesto($anio)
{
    if ($anio % 100 == 0) {
        return 'El año ' . $anio . ' no es bisiesto';
    } else if ($anio % 4 == 0 and $anio % 400 == 0) {
        return 'El año ' . $anio . ' es bisiesto';
    }
}

