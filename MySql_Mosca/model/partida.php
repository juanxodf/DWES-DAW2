<?php
require_once __DIR__ . "../database/conexion.php";

class Partida {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function crear($id_usuario) {
        $tablero = array_fill(0, 9, 0);
        $posMosca = rand(0, 8);
        $tablero[$posMosca] = 1;

        $stmt = $this->pdo->prepare("
            INSERT INTO PARTIDA (id_usuario, intentos, tablero, posicion_mosca, estado, fecha_inicio) 
            VALUES (?, 0, ?, ?, 'en curso', NOW())
        ");
        $stmt->execute([$id_usuario, json_encode($tablero), $posMosca]);

        return $this->pdo->lastInsertId();
    }

    public function obtener($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM PARTIDA WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function golpear($id, $casilla) {
        $partida = $this->obtener($id);
        if (!$partida || $partida["estado"] !== "en curso") return null;

        $intentos = $partida["intentos"] + 1;
        $estado = ($casilla == $partida["posicion_mosca"]) ? "ganada" : "en curso";

        $update = $this->pdo->prepare("UPDATE PARTIDA SET intentos = ?, estado = ? WHERE id = ?");
        $update->execute([$intentos, $estado, $id]);

        return ["estado" => $estado, "intentos" => $intentos];
    }

    public function rendirse($id) {
        $update = $this->pdo->prepare("UPDATE PARTIDA SET estado = 'perdida', fecha_fin = NOW() WHERE id = ?");
        return $update->execute([$id]);
    }
}
