<?php
echo($_SERVER['REQUEST_METHOD']);
echo($_SERVER['REQUEST_URI']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $datosRecibidos = file_get_contents('php://input');
    
    $data = json_decode($datosRecibidos,true);
    echo $data["nombre"];
    echo($data["edad"]);
    echo($data["objeto"][0]["dni"]);

    $dataObj = json_decode($datosRecibidos,false);
    echo $dataObj->nombre;
    echo $dataObj->edad;
    echo $data[""][0][""];
}
else{
    header("HTTP/1.1 400 Bad Request");
    echo("Se esperaba una petición POST");
};