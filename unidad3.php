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

	<!-- Comentarios guardados en comentarios.txt -->
	<section class="columna">

		<h2> Comentarios Guardados: </h2>

		<div class="lista-comentarios">
		
			<?php
				$archivo = "comentarios.txt";

				if (file_exists($archivo) && filesize($archivo) > 0) {
					$lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
					foreach (array_reverse($lineas) as $linea) {
						echo $linea;
					}
				} else {
					echo '<p class="indicacion">Todavía no hay comentarios.</p>';
				}
			?>
		
		</div>
	</section>

	<!-- Formulario de comentarios -->
	<aside class="columna panel-claro">

		<h2> Cargar un comentario </h2>

		<form method="post" action="comentarios.php" class="form-comentarios">
			<p>
				<label for="nombre"> Nombre: </label>
				<input type="text" id="nombre" name="nombre" maxlength="50" placeholder="Tu nombre" required>
			</p>
			
			<p>
				<label for="apellido"> Apellido: </label>
				<input type="text" id="apellido" name="apellido" maxlength="50" placeholder="Tu apellido" required>
			</p>
			
			<p>
				<label for="mail"> Mail: </label>
				<input type="email" id="mail" name="mail" maxlength="100" placeholder="tu@email.com" required>
			</p>

			<p>
				<label for="comentario"> Comentario: </label>
				<textarea id="comentario" name="comentario" rows="4" placeholder="Escribe tu comentario..." required></textarea>
			</p>
			
			<input type="submit" value="Enviar comentario">
		</form>
	</aside>

	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>