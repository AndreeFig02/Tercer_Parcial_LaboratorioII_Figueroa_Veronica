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

	<!-- Agenda de clases -->
	<section class="columna">
		<h2>Agenda de clases</h2>

		<form method="post" action="parte 1/insertar_clases.php">
			<p>
				<label for="unidad"> Unidad: </label>
				<input type="text" id="unidad" name="unidad" maxlength="50" required>
			</p>

			<p>
				<label for="fecha"> Fecha: </label>
				<input type="date" id="fecha" name="fecha" required>
			</p>
			
			<input type="submit" value="Agregar clase">
		</form>
	</section>

	<!--  Clases cargadas -->
	<aside class="columna">
		<h2>Clases cargadas</h2>
		<?php include("parte 1/ver_clases.php"); ?>
	</aside>

	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
</div>
</body>
</html>