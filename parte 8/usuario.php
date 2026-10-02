<?php
    class Usuario {
        private $email;
        private $contrasena;

        public function __construct($email, $contrasena) {
            $this->email = $email;
            $this->contrasena = $contrasena;
        }

        public function registrar() {
            global $conexion;

            $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);

            try {
                $stmt = $conexion->prepare("INSERT INTO registro (email, contrasena) VALUES (?, ?)");
                $stmt->bind_param("ss", $this->email, $hash);
                $resultado = $stmt->execute();
                $stmt->close();
                return $resultado;
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() === 1062) {
                    return false;
                }
                throw $e;
            }
        }

        public function verificar() {
            global $conexion;

            $stmt = $conexion->prepare("SELECT contrasena FROM registro WHERE email = ?");
            $stmt->bind_param("s", $this->email);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows === 1) {
                $fila = $resultado->fetch_assoc();
                // Compara la contraseña ingresada con el hash guardado en la BD
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