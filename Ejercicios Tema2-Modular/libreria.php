<?php
// Funciones
function bisiesto($anio)
{
    if ($anio % 100 == 0) {
        return 'El año ' . $anio . ' no es bisiesto';
    } else if ($anio % 4 == 0 and $anio % 400 == 0) {
        return 'El año ' . $anio . ' es bisiesto';
    }
}

function factorial($num)
{
    for ($i = $num; $i = 1; $i--) {
        $i = $i * $i;
    }
    return 'El factorial de ' . $num . ' es ' . $i;
}

function algoritmo($num1, $num2)
{
    $cont = 0;
    while ($num1 >= $num2) {
        $num1 = $num1 - $num2;
        $cont++;
    }
    return 'El cociente es ' . $cont . ' y el resto es ' . $num1;
}

function hora($hora, $minuto, $segundo)
{
    if ($segundo < 59) {
        $segundo++;
    } else if ($minuto < 59) {
        $minuto++;
        $segundo = 0;
    } else if ($hora < 23) {
        $hora++;
        $minuto = 0;
        $segundo = 0;
    } else {
        $hora = 0;
        $minuto = 0;
        $segundo = 0;
    }
    return 'La hora es ' . $hora . ':' . $minuto . ':' . $segundo;
}

function digitos($num)
{
    $pares = 0;
    $impares = 0;
    while ($num > 0) {
        $digito = $num % 10;
        if ($digito % 2 == 0) {
            $pares++;
        } else {
            $impares++;
        }
        $num = (int)($num / 10);
    }
    return 'El número tiene ' . $pares . ' dígitos pares y ' . $impares . ' dígitos impares';
}
