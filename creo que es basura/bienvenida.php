<?php
if (!isset($_GET['user'])) {
    echo "Acceso no autorizado.";
    exit();
}
$usuario = $_GET['user'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <h1>Hola <?php echo htmlspecialchars($usuario); ?></h1>
</body>
</html>
