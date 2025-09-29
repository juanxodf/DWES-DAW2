<?php

/** ****************** Conectar ************************* */
// Utilizando la forma procedimental.
$conexion = mysqli_connect('localhost', 'juan', '', 'ejemplo');
if (!$conexion) {
    print "Fallo al conectar a MySQL: " . mysqli_connect_error();
}

/******************** Cerrar la conexión *********************/
mysqli_close($conexion);
//unset($conexion);
print "Conexión 2 cerrada" . "<br>";