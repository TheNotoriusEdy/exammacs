<?php

require_once 'LoginController.php';

class MedicoController {
    private $auth;
    private $pdo;

    public function __construct($pdo) {
        $this->auth = new AuthController($pdo);
        $this->pdo = $pdo;
    }

    public function soloMedico() {
        if (!$this->auth->checkRole('Medico')) {
            header('Location: /index.php');
            exit;
        }
    }

    // 1. Método para guardar médico
    public function guardarMedico($datos) {
        $nombre = $datos['nombre'];
        $especialidad = $datos['especialidad'];
        $horario = $datos['horario_atencion'];
        $licencia = $datos['licencia'];
        $usuario_id = $datos['usuario_id'];

        $sql = "INSERT INTO medicos (medico_id, nombre, especialidad, horario_atencion, licencia)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$usuario_id, $nombre, $especialidad, $horario, $licencia]);
    }

    // 2. Método para procesar el formulario
    public function procesarFormulario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $exito = $this->guardarMedico($_POST);
            if ($exito) {
                header('Location: /dashboard_medico.php?exito=1');
            } else {
                header('Location: /dashboard_medico.php?error=1');
            }
            exit;
        }
    }
}
?>