<?php
	if (isset($_POST['unidad']) && isset($_POST['fecha'])) {

		$unidad = $_POST['unidad'];
		$fecha  = $_POST['fecha']; 

		$conexion = mysqli_connect("localhost", "root", "", "phpavanzado") or die("Error de conexión: " . mysqli_connect_error());
		mysqli_set_charset($conexion, "utf8");

		$stmt = mysqli_prepare($conexion, "INSERT INTO clases (unidad, fecha) VALUES (?, ?)");
		mysqli_stmt_bind_param($stmt, "ss", $unidad, $fecha);
		mysqli_stmt_execute($stmt) or die("Error " . mysqli_error($conexion));
		mysqli_stmt_close($stmt);
		mysqli_close($conexion);
	}

	header("Location: unidad1.php");
	exit;
?>