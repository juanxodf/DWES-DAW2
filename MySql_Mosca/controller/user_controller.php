<?php
require_once __DIR__ . "../model/user.php";

class UserController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function login($data) {
        $user = $this->user->findByName($data["nombre"]);
        if ($user && $user["pass"] === $data["pass"]) {
            $rol = $this->user->getRole($user["id"]);
            return ["id" => $user["id"], "nombre" => $user["nombre"], "rol" => $rol];
        }
        return ["error" => "Credenciales inválidas"];
    }

    public function index($adminId) {
        if (!$this->user->getRole($adminId) === "admin") {
            return ["error" => "No autorizado"];
        }
        return $this->user->all();
    }

    public function create($data) {
        $id = $this->user->create($data["nombre"], $data["pass"], $data["mail"]);
        return ["message" => "Usuario creado", "id" => $id];
    }

    public function update($id, $data, $adminId) {
        if (!$this->user->getRole($adminId) === "admin") {
            return ["error" => "No autorizado"];
        }
        $this->user->update($id, $data["nombre"], $data["mail"]);
        return ["message" => "Usuario actualizado"];
    }

    public function delete($id, $adminId) {
        if (!$this->user->getRole($adminId) === "admin") {
            return ["error" => "No autorizado"];
        }
        $this->user->delete($id);
        return ["message" => "Usuario eliminado"];
    }
}
