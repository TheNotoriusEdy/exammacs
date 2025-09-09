<?php
require_once 'AuthController.php';

class AdminController {
    private $auth;

    public function __construct($pdo) {
        $this->auth = new AuthController($pdo);
    }

    public function soloAdmin() {
        if (!$this->auth->checkRole('Administrador')) {
            header('Location: /index.php');
            exit;
        }
    }
}
?>