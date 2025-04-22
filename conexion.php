<?php
// Datos de conexión
$host = "localhost";
$user = "root";
$pass = ""; // Contraseña vacía por defecto en XAMPP
$db   = "alumnos_db";

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
