<?php
	include("parte 7/producto.php");
	$producto = new Producto();

	if (isset($_GET['eliminar'])) {
		$producto->eliminar_producto($_GET['eliminar']);
		header("Location:unidad7.php");
		exit();
	}

	if (isset($_POST['nombre'])) {
		$producto->introducir_producto($_POST['nombre'], $_POST['descripcion'], $_POST['precio']);
		header("Location:unidad7.php");
		exit();
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

	<section>
		<h2> Lista de Productos: </h2>
		<?php $producto->listar_producto(); ?>
	</section>

	<aside>
		<h2> Cargar un Producto </h2>

		<form action="unidad7.php" method="post">
			
			<label for="nombre"> Nombre del producto: </label>
			<input type="text" id="nombre" name="nombre" maxlength="30" required>

			<label for="descripcion"> Descripción: </label>
			<textarea id="descripcion" name="descripcion" rows="4" maxlength="255" required></textarea>

			<label for="precio"> Precio: </label>
			<input type="number" id="precio" name="precio" step="0.01" min="0" required>

			<input type="submit" value="Guardar Producto" class="btn-guardar">
		</form>
	</aside>

	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>