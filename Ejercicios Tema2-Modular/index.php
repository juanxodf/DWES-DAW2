<?php

/* ------------------------- Ejercicios sin arrays ------------------------- */

//Determinar, modularmente, si un año pedido por teclado es bisiesto o no
$anio = 1456;
bisiesto($anio);

//  Calcula modularmente el factorial de un número entero. El factorial es el
// resultado de multiplicar ese número por todos los números menores que él. Ejemplo:
// 4! = 4*3*2*1 = 24.

$num = 7;
factorial($num);


/*
Dados dos números enteros, realizar el algoritmo que calcule el cociente y el
resto mediante restas sucesivas. Modularmente.
*/
$num1 = 20;
$num2 = 3;
algoritmo($num1,$num2);

/*
Dada una hora por teclado (horas, minutos y segundos) realiza un algoritmo que
muestre la hora después de incrementarle un segundo.
*/

$hora = 23;
$minuto = 59;
$segundo = 59;
hora($hora,$minuto,$segundo);

/*
Realiza un módulo que me devuelva cuantos dígitos pares y cuantos impares
tiene un número. Ejemplo: 234656, devolvería: 4 dígitos pares y 2 impares.
*/
$num = 234656;
digitos($num);


/* ------------------------- Ejercicios con arrays ------------------------- */

/*
Diseña un programa que genere un vector con números al azar que oscilan entre
[-100 y 100]. Después realiza un módulo que indique cuantos números positivos y
cuantos negativos hay.
*/


/*
Dado un array de números de 5 posiciones con los siguiente valores {1,2,3,4,5},
guardar los valores de este array en otro array distinto pero con los valores invertidos,
es decir, que el segundo array deberá tener los valores {5,4,3,2,1}.
*/


/*
Crea una aplicación que pida un numero por teclado y después comprobaremos si
el numero introducido es capicúa, es decir, que se lee igual sin importar la dirección.
Por ejemplo, si introducimos 30303 es capicúa, si introducimos 30430 no es capicúa.
Utiliza vectores para resolver el problema.
*/


/*
Donde está la mosca.
Vamos a intentar cazar una mosca. La mosca será un valor que se introduce en una
posición de un vector; el jugador no ve el panel pero si ve las casillas a las que puede
golpear. Si la mosca está en esa posición se acaba el juego, mosca cazada. Si la mosca
no está en esa posición pueden ocurrir dos cosas: que la mosca esté en casillas
adyacentes en cuyo caso la mosca revolotea y se sitúa en otra casilla o que la mosca no
esté en casillas adyacentes, en este caso la mosca permanece donde está.
*/

