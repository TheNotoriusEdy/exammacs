<?php

// Configuración de la base de datos
$host = 'localhost';
$dbname = 'clinica'; // Cambia por el nombre real de tu base de datos
$user = 'root';      // Cambia por tu usuario de base de datos
$pass = '';          // Cambia por tu contraseña de base de datos

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    // Para MySQL usa: $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>