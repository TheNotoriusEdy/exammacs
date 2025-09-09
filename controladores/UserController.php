<?php
<?php

class UserController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Guarda usuario en la base de datos
    public function guardarUsuario($datos) {
        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $password = password_hash($datos['password'], PASSWORD_DEFAULT);
        $rol_id = $datos['rol_id'];

        $sql = "INSERT INTO usuarios (nombre, email, password_hash, rol_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $email, $password, $rol_id]);
    }

    // Procesa el formulario de usuario
    public function procesarFormulario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $exito = $this->guardarUsuario($_POST);
            if ($exito) {
                header('Location: /dashboard_usuario.php?exito=1');
            } else {
                header('Location: /dashboard_usuario.php?error=1');
            }
            exit;
        }
    }
}