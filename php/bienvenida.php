<?php
session_start();

// Verificar si el usuario inició sesión
if (!isset($_SESSION['no_control'])) {
    header("Location: index.html");
    exit();
}

$control = htmlspecialchars($_SESSION['no_control']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
    <h1>✅ Bienvenido, <?php echo $control; ?></h1>
</body>
</html>

