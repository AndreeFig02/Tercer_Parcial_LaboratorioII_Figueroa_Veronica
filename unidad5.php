<?php
session_start();
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
	<section class="columna columna-centrada">
		<h2> Formulario de Consulta </h2>

		<?php
		if (isset($_GET['error']) && $_GET['error'] == 'captcha') {
			echo '<p class="resultado error">El código CAPTCHA ingresado no coincide. Intente nuevamente.</p>';
		}
		if (isset($_GET['ok'])) {
			echo '<p class="resultado ok">¡Consulta enviada y guardada con éxito!</p>';
		}
		?>

		<form action="cargar.php" method="POST" class="form-comentarios">
			<p>
				<label for="nombre"> Nombre: </label><br>
				<input type="text" id="nombre" name="nombre" required>
			</p>

			<p>
				<label for="apellido"> Apellido: </label><br>
				<input type="text" id="apellido" name="apellido" required>
			</p>

			<p>
				<label for="email"> Email: </label><br>
				<input type="email" id="email" name="email" required>
			</p>

			<p>
				<label for="consulta"> Consulta: </label><br>
				<textarea id="consulta" name="consulta" rows="4" required></textarea>
			</p>
			
			<p>
				<label for="captcha"> Código de Seguridad: </label><br>
				
				<div class="captcha-container">
					<img src="parte 5/imagen_captcha.php" alt="CAPTCHA" class="img-captcha">
					<input type="text" id="captcha" name="captcha" placeholder="Ingrese el código" required class="input-captcha">
				</div>
			</p>

			<p>
				<input type="submit" value="Enviar Consulta" class="btn-calcular">
			</p>
		</form>
	</section>

	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>