<?php

require_once 'LoginController.php';

class MedicoController {
    private $auth;

    public function __construct($pdo) {
        $this->auth = new AuthController($pdo);
    }

    public function soloMedico() {
        if (!$this->auth->checkRole('Medico')) {
            header('Location: /index.php');
            exit;
        }
    }
}
?>