<?php
session_start();
require 'conexion.php';

$control = $_POST['control'] ?? '';
$nip     = $_POST['nip'] ?? '';

$sql = "SELECT * FROM usuarios WHERE no_control = ? AND nip = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $control, $nip);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $_SESSION['no_control'] = $control;
    echo "ok";
} else {
    echo "error";
}
?>
