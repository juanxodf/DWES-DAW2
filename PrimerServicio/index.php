<?php
    $ve = [
        "1A" => "Ana",
        "2B" => "Luis",
        "3C"=> "Sara",
        "4D"=> "Alberto"
    ];

    header("HTTP/1.1 200 OK");
    echo json_encode($ve);