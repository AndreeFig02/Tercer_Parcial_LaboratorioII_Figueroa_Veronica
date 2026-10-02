<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Solo se procesa si llegan los datos del formulario
if (isset($_POST['nombre'], $_POST['apellido'], $_POST['mail'], $_POST['comentario'])) {

	$nombre     = htmlspecialchars(trim($_POST['nombre']));
	$apellido   = htmlspecialchars(trim($_POST['apellido']));
	$mail       = htmlspecialchars(trim($_POST['mail']));
	$comentario = htmlspecialchars(trim($_POST['comentario']));

	// Se guarda si es que no hay campos vacíos
	if ($nombre != "" && $apellido != "" && $mail != "" && $comentario != "") {

		// Fecha y horario del envío del fomrulario
		$fecha = date("d/m/Y H:i:s");

		$comentario = nl2br($comentario);
		$comentario = str_replace(array("\r", "\n"), "", $comentario);

		// Se arma el bloque de HTML para los comentarios
		$registro = '<div class="comentario">'
			. '<p class="fecha"><strong>Fecha:</strong> ' . $fecha . '</p>'
			. '<p><strong>Usuario:</strong> ' . $nombre . ' ' . $apellido
			. ' (<a href="mailto:' . $mail . '">' . $mail . '</a>)</p>'
			. '<p><strong>Comentario:</strong> ' . $comentario . '</p>'
			. '</div>' . "\n";

		$f = fopen("comentarios.txt", "a") or die("Error al abrir el archivo comentarios.txt");
		fputs($f, $registro);
		fclose($f);
	}
}

// Redireccionamos para que se muestre los comentarios.txt en unidad3.php
header("Location: unidad3.php");
exit;
?>