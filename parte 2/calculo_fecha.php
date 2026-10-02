<?php
session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');

$dia  = isset($_POST['dia'])  ? (int)$_POST['dia']  : 0;
$mes  = isset($_POST['mes'])  ? (int)$_POST['mes']  : 0;
$anio = isset($_POST['anio']) ? (int)$_POST['anio'] : 0;

// Validación de fecha existente
if (!checkdate($mes, $dia, $anio)) {
	$resultado = array(
		'texto' => "La fecha $dia/$mes/$anio no existe. Revisá los datos ingresados.",
		'clase' => "error"
	);
} else {
	$fecha_final = mktime(0, 0, 0, $mes, $dia, $anio);
	$hoy         = strtotime(date("Y-m-d"));

	// Diferencia de día
	$dias = (int) round(($fecha_final - $hoy) / 86400);

	$fecha_texto = date("d/m/Y", $fecha_final);

	if ($dias > 0) {
		$texto = ($dias == 1)
			? "Falta 1 día para el $fecha_texto."
			: "Faltan $dias días para el $fecha_texto.";
	} elseif ($dias == 0) {
		$texto = "La fecha $fecha_texto es hoy.";
	} else {
		$pasados = abs($dias);
		$texto = ($pasados == 1)
			? "La fecha $fecha_texto ya pasó: fue hace 1 día."
			: "La fecha $fecha_texto ya pasó: fue hace $pasados días.";
	}
	$resultado = array('texto' => $texto, 'clase' => "ok");
}

// Se guarda el resultado y se muestra en la unidad2.php
$_SESSION['resultado_fecha'] = $resultado;
header("Location: unidad2.php");
exit;
?>