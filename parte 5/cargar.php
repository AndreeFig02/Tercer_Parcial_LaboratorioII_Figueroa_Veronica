<?php
session_start();

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "phpavanzado")
    or die("Error de conexión: " . mysqli_connect_error());
mysqli_set_charset($conexion, "utf8");

// Formulario
$nombre   = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$email    = trim($_POST['email'] ?? '');
$consulta = trim($_POST['consulta'] ?? '');
$captcha_ingresado = trim($_POST['captcha'] ?? '');

// Verificación de captchat
if (!isset($_SESSION["captcha_codigo"]) || $captcha_ingresado !== $_SESSION["captcha_codigo"]) {
    header("Location: unidad5.php?error=captcha");
    exit();
}
$nombre   = mysqli_real_escape_string($conexion, $nombre);
$apellido = mysqli_real_escape_string($conexion, $apellido);
$email    = mysqli_real_escape_string($conexion, $email);
$consulta = mysqli_real_escape_string($conexion, $consulta);

$sql = "INSERT INTO consultas (nombre, apellido, email, consulta) 
        VALUES ('$nombre', '$apellido', '$email', '$consulta')";

if (mysqli_query($conexion, $sql)) {
    unset($_SESSION["captcha_codigo"]); // Actualiza el catpcha que ya se utilizo
    header("Location: unidad5.php?ok=1");
    exit();
} else {
    echo "Error al registrar la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>