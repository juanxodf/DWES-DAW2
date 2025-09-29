<?php
require_once __DIR__ . "../model/partida.php";

class PartidaController {
    private $partida;

    public function __construct() {
        $this->partida = new Partida();
    }

    public function crear($data) {
        $id = $this->partida->crear($data["id_usuario"]);
        return ["message" => "Partida iniciada", "id" => $id];
    }

    public function obtener($id) {
        $partida = $this->partida->obtener($id);
        return $partida ?: ["error" => "Partida no encontrada"];
    }

    public function golpear($id, $data) {
        $resultado = $this->partida->golpear($id, $data["casilla"]);
        return $resultado ?: ["error" => "Movimiento inválido"];
    }

    public function rendirse($id) {
        $this->partida->rendirse($id);
        return ["message" => "Te has rendido"];
    }
}
