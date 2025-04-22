<?php
session_start();

if (!isset($_SESSION['no_control'])) {
    die("Error: usuario no autenticado.");
}

$no_control = $_SESSION['no_control'];

$conexion = new mysqli("localhost", "root", "", "alumnos_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM encuesta WHERE no_control = '$no_control' ORDER BY fecha DESC LIMIT 1";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    echo "<h2>Respuestas de la Encuesta</h2>";
    echo "<ul>";
    echo "<li><strong>Docentes:</strong> " . $fila['docentes'] . "</li>";
    echo "<li><strong>Plan de Estudios:</strong> " . $fila['plan_estudios'] . "</li>";
    echo "<li><strong>Proyectos:</strong> " . $fila['proyectos'] . "</li>";
    echo "<li><strong>Investigación:</strong> " . $fila['investigacion'] . "</li>";
    echo "<li><strong>Infraestructura:</strong> " . $fila['infraestructura'] . "</li>";
    echo "<li><strong>Residencia:</strong> " . $fila['residencia'] . "</li>";
    echo "<li><strong>Fecha:</strong> " . $fila['fecha'] . "</li>";
    echo "</ul>";
} else {
    echo "No se encontraron respuestas.";
}

$conexion->close();
?>
