<?php
require_once __DIR__ . "controller/user_controller.php";
require_once __DIR__ . "controller/partida_controller.php";

function getRequestData() {
    return json_decode(file_get_contents("php://input"), true);
}

function response($data, $code = 200) {
    http_response_code($code);
    header("Content-Type: application/json");
    echo json_encode($data);
    exit;
}

$method = $_SERVER["REQUEST_METHOD"];
$uri = explode("/", trim($_SERVER["REQUEST_URI"], "/"));

$userCtrl = new UserController();
$partidaCtrl = new PartidaController();

// ---------------- LOGIN ----------------
if ($method === "POST" && $uri[0] === "login") {
    $data = getRequestData();
    response($userCtrl->login($data));
}

// ---------------- USERS ----------------
if ($uri[0] === "users") {
    if ($method === "GET") {
        $adminId = $_GET["id_admin"] ?? null;
        response($userCtrl->index($adminId));
    }
    if ($method === "POST") {
        $data = getRequestData();
        response($userCtrl->create($data), 201);
    }
    if ($method === "PUT" && isset($uri[1])) {
        $data = getRequestData();
        $adminId = $_GET["id_admin"] ?? null;
        response($userCtrl->update($uri[1], $data, $adminId));
    }
    if ($method === "DELETE" && isset($uri[1])) {
        $adminId = $_GET["id_admin"] ?? null;
        response($userCtrl->delete($uri[1], $adminId));
    }
}

// ---------------- PARTIDAS ----------------
if ($uri[0] === "partida") {
    if ($method === "POST") {
        $data = getRequestData();
        response($partidaCtrl->crear($data), 201);
    }
    if ($method === "GET" && isset($uri[1])) {
        response($partidaCtrl->obtener($uri[1]));
    }
    if ($method === "PUT" && isset($uri[1]) && isset($uri[2]) && $uri[2] === "golpear") {
        $data = getRequestData();
        response($partidaCtrl->golpear($uri[1], $data));
    }
    if ($method === "PUT" && isset($uri[1]) && isset($uri[2]) && $uri[2] === "rendirse") {
        response($partidaCtrl->rendirse($uri[1]));
    }
}

// ---------------- DEFAULT ----------------
response(["error" => "Endpoint no encontrado"], 404);
