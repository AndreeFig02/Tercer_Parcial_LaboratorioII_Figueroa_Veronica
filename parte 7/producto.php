<?php
    class Producto
    {
        // Datos de los productos
        private $id_producto;
        private $nombre;
        private $descripcion;
        private $precio;

        private $conexion;

        function __construct()
        {
            $this->conexion = new mysqli("localhost", "root", "", "phpavanzado");

            if ($this->conexion->connect_errno) {
                die("Falló la conexión con MySQL: " . $this->conexion->connect_error);
            }
        }

        // Inserta un nuevo producto
        public function introducir_producto($nombre, $descripcion, $precio)
        {
            $nombre = $this->conexion->real_escape_string($nombre);
            $descripcion = $this->conexion->real_escape_string($descripcion);
            $precio = $this->conexion->real_escape_string($precio);

            $sql = "INSERT INTO productos (nombre, descripcion, precio)
                    VALUES ('$nombre', '$descripcion', '$precio')";

            return $this->conexion->query($sql);
        }

        // Elimina un producto
        public function eliminar_producto($id)
        {
            $id = (int) $id;

            $sql = "DELETE FROM productos WHERE id_producto = $id";

            return $this->conexion->query($sql);
        }

        // Lista todos los productos en una tabla
        public function listar_producto()
        {
            $sql = "SELECT id_producto, nombre, descripcion, precio FROM productos ORDER BY id_producto ASC";
            $resultado = $this->conexion->query($sql);

            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th></th></tr>";

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['id_producto'] . "</td>";
                    echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
                    echo "<td>$" . number_format($fila['precio'], 2) . "</td>";
                    echo "<td><a href='unidad7.php?eliminar=" . $fila['id_producto'] . "' class='btn-eliminar'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'> No hay productos cargados. </td></tr>";
            }

            echo "</table>";
        }
    }
?>