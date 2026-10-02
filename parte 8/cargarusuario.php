<?php
    require_once("../conexion.php");
    require_once("../parte 8/usuario.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        if (!empty($email) && !empty($contrasena)) {
            $usuario = new Usuario($email, $contrasena);

            if ($usuario->registrar()) {
                echo "<h3> ¡Usuario registrado con éxito! </h3>";
                echo "<a href='../unidad8.php'> Volver </a>";
            } else {
                echo "<h3> El correo electrónico ingresado ya se encuentra registrado. </h3>";
                echo "<a href='../unidad8.php'> Volver e intentar con otro email </a>";
            }
        }
    }
?>