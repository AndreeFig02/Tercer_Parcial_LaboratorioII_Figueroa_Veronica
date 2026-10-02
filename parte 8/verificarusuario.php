<?php
    require_once("../conexion.php");
    require_once("usuario.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        if (!empty($email) && !empty($contrasena)) {
            $usuario = new Usuario($email, $contrasena);

        if ($usuario->verificar()) {
            echo "<h3> ¡Ingreso exitoso! Bienvenido/a. </h3>";
            echo "<a href='../unidad8.php'> Volver al inicio </a>";
        } else {
            echo "<h3> Error: Email o contraseña incorrectos. </h3>";
            echo "<a href='../unidad8.php'> Volver a intentar </a>";
        }
    } else {
        echo "<h3> Por favor, complete todos los campos. </h3>";
    }
}
?>