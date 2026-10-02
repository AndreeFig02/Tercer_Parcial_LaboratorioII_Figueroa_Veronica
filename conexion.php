<?php
    $host = "localhost";
    $usuario = "root";
    $clave = "";
    $db = "phpavanzado";

    $conexion = new mysqli($host, $usuario, $clave, $db);

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }
    $conexion->set_charset("utf8mb4");
?>