<?php
require_once __DIR__ . "../database/conexion.php";

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function findByName($nombre) {
        $stmt = $this->pdo->prepare("SELECT * FROM USERS WHERE nombre = ?");
        $stmt->execute([$nombre]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRole($userId) {
        $stmt = $this->pdo->prepare("
            SELECT r.clase 
            FROM ROL_USER ru
            JOIN ROLES r ON ru.id_rol = r.id
            WHERE ru.id_user = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchColumn();
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT id, nombre, mail FROM USERS");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nombre, $pass, $mail) {
        $stmt = $this->pdo->prepare("INSERT INTO USERS (nombre, pass, mail) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $pass, $mail]);
        $userId = $this->pdo->lastInsertId();

        // Por defecto rol jugador (id = 2)
        $this->pdo->prepare("INSERT INTO ROL_USER (id_user, id_rol) VALUES (?, 2)")->execute([$userId]);

        return $userId;
    }

    public function update($id, $nombre, $mail) {
        $stmt = $this->pdo->prepare("UPDATE USERS SET nombre = ?, mail = ? WHERE id = ?");
        return $stmt->execute([$nombre, $mail, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM USERS WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
