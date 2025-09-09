<?php

session_start();
require_once __DIR__ . '/../modelo/bd.php';

class AuthController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Validar login
    public function login($email, $password, $rol) {
        if (empty($email) || empty($password) || empty($rol)) {
            return ['success' => false, 'message' => 'Todos los campos son obligatorios.'];
        }

        $stmt = $this->pdo->prepare(
            "SELECT u.usuario_id, u.nombre, u.email, u.password_hash, r.nombre as rol
             FROM usuarios u
             JOIN roles r ON u.rol_id = r.rol_id
             WHERE u.email = :email AND r.nombre = :rol"
        );
        $stmt->execute(['email' => $email, 'rol' => $rol]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user'] = [
                'usuario_id' => $user['usuario_id'],
                'nombre' => $user['nombre'],
                'email' => $user['email'],
                'rol' => $user['rol']
            ];
            return ['success' => true, 'rol' => $user['rol']];
        }
        return ['success' => false, 'message' => 'Credenciales incorrectas.'];
    }

    // Cerrar sesión
    public function logout() {
        session_destroy();
        return ['success' => true];
    }

    // Verificar rol
    public function checkRole($rol) {
        return isset($_SESSION['user']) && $_SESSION['user']['rol'] === $rol;
    }
}
?>