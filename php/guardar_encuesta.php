<?php
session_start();

// Verifica si hay sesión iniciada
if (!isset($_SESSION['no_control'])) {
    die("Error: usuario no autenticado.");
}

$no_control = $_SESSION['no_control'];

// Conexión a la base de datos (ajusta con tus datos)
$conexion = new mysqli("localhost", "root", "", "alumnos_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener datos del formulario
$docentes = $_POST['docentes'];
$plan_estudios = $_POST['plan_estudios'];
$proyectos = $_POST['proyectos'];
$investigacion = $_POST['investigacion'];
$infraestructura = $_POST['infraestructura'];
$residencia = $_POST['residencia'];

// Insertar datos
$sql = "INSERT INTO encuesta (
    no_control, docentes, plan_estudios, proyectos, investigacion, infraestructura, residencia
) VALUES (
    '$no_control', '$docentes', '$plan_estudios', '$proyectos', '$investigacion', '$infraestructura', '$residencia'
)";

if ($conexion->query($sql) === TRUE) {
    //echo "Respuestas guardadas correctamente.";
    header("location:resultados.php");
    exit();
} else {
    echo "Error al guardar: " . $conexion->error;
}

$conexion->close();
?>
