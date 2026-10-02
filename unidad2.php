<?php
	$mensaje = "";
	$clase   = "";
	if (isset($_SESSION['resultado_fecha'])) {
		$mensaje = $_SESSION['resultado_fecha']['texto'];
		$clase   = $_SESSION['resultado_fecha']['clase'];
		unset($_SESSION['resultado_fecha']); // se muestra una sola vez
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  	<link rel="stylesheet" href="css/estilos.css">
</head>
 
<body>
 
<div class="container">
	<header>
		<h1> Programación en PHP y MySQL - Nivel Avanzado </h1>
		<nav>
			<?php include("botonera.php"); ?>
		</nav>
	</header>

	<!-- Formulario -->
	<section class="columna">
		<h2> Cálculo de Fechas </h2>

		<p> Debe de ingresar una fecha futura: </p>

		<form method="post" action="calculo_fecha.php">
			<div class="campos-fecha">
				<div>
					<label for="dia"> Día: </label><br>
					<input type="number" id="dia" name="dia" min="1" max="31" required>
				</div>
				<div>
					<label for="mes"> Mes: </label><br>
					<input type="number" id="mes" name="mes" min="1" max="12" required>
				</div>
				<div>
					<label for="anio"> Año: </label><br>
					<input type="number" id="anio" name="anio" min="1970" max="9999" required>
				</div>
			</div>
			<input type="submit" value="Calcular días" class="btn-calcular">
		</form>
	</section>

	<!-- Columna derecha: resultado -->
	<aside class="columna panel-claro">
		<?php if ($mensaje != "") { ?>
			<p class="resultado <?php echo $clase; ?>"><?php echo htmlspecialchars($mensaje); ?></p>
		<?php } else { ?>
			<p class="indicacion">Debe de ingrasar una fecha del lado izquierdo para calcular los días restantes.</p>
		<?php } ?>
	</aside>

	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>