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
$actividad = $_POsT['actividad'];
$actividad = $_POST['actividad'];
$actividad = $_POST['actividad'];



// Verifica si ya existe un registro con ese no_control
$verifica = "SELECT * FROM encuesta WHERE no_control = '$no_control'";
$resultado = $conexion->query($verifica);

if ($resultado->num_rows > 0) {
    // Ya existe, no se permite duplicado
    echo " Ya has enviado esta sección de la encuesta. No es necesario volver a llenarla.";
} else {
    // Insertar datos
    $sql = "INSERT INTO encuesta (
        no_control, docentes, plan_estudios, proyectos, investigacion, infraestructura, residencia
    ) VALUES (
        '$no_control', '$docentes', '$plan_estudios', '$proyectos', '$investigacion', '$infraestructura', '$residencia'
    )";

    if ($conexion->query($sql) === TRUE) {
        header("location:encuesta2.html");
        exit();
    } else {
        echo "Error al guardar: " . $conexion->error;
    }
}

$conexion->close();
?>
