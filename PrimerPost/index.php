<?php
header('Content-Type: text/plain');

echo "Método: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "URI: " . $_SERVER['REQUEST_URI'] . "\n";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datosRecibidos = file_get_contents('data.json');
    
    if (!$datosRecibidos) {
        echo "No se recibieron datos en el body.\n";
        exit;
    }

    // Decodificar como array asociativo
    $data = json_decode($datosRecibidos, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Error al decodificar JSON: " . json_last_error_msg() . "\n";
        exit;
    }

    print_r($data);

    if (isset($data["objeto"][0]["dni"])) {
        echo "DNI: " . $data["objeto"][0]["dni"] . "\n";
    } else {
        echo "No se encontró 'dni' en el JSON.\n";
    }

    // Decodificar como objeto
    $dataObj = json_decode($datosRecibidos, false);
    if (isset($dataObj->objeto[0]->dni)) {
        echo "DNI (objeto): " . $dataObj->objeto[0]->dni . "\n";
    } else {
        echo "No se encontró 'dni' en el objeto JSON.\n";
    }

} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Se esperaba una petición POST.\n";
}
