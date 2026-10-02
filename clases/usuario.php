<?php
// Usuario.php

class Conexion {
    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $db = "phpavanzado"; // Nombre de tu base de datos
    protected $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }
}

class Usuario extends Conexion {
    private $email;
    private $contrasena;

    public function __construct($email = null, $contrasena = null) {
        parent::__construct();
        $this->email = $email;
        $this->contrasena = $contrasena;
    }

    // Método para cargar un nuevo usuario con la contraseña encriptada
    public function registrar() {
        // Encriptación segura de la contraseña
        $hashContrasena = password_hash($this->contrasena, PASSWORD_DEFAULT);

        $stmt = $this->conexion->prepare("INSERT INTO registro (email, contrasena) VALUES (?, ?)");
        $stmt->bind_param("ss", $this->email, $hashContrasena);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    // Método para verificar credenciales en el Login
    public function verificar() {
        $stmt = $this->conexion->prepare("SELECT contrasena FROM registro WHERE email = ?");
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $fila = $resultado->fetch_assoc();
            // Verifica el hash encriptado
            if (password_verify($this->contrasena, $fila['contrasena'])) {
                $stmt->close();
                return true;
            }
        }
        $stmt->close();
        return false;
    }
}
?>