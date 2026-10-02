<?php

$conexion = mysqli_connect("localhost", "root", "", "phpavanzado")
	or die("Error de conexión: " . mysqli_connect_error());
mysqli_set_charset($conexion, "utf8");

// Consulta
$result = mysqli_query($conexion, "SELECT id_clase, unidad, fecha FROM clases ORDER BY fecha")
	or die("Error " . mysqli_error($conexion));

if (mysqli_num_rows($result) > 0) {
?>
	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<th> ID </th>
			<th> Unidad </th>
			<th> Fecha </th>
		</tr>
<?php
	while ($row = mysqli_fetch_array($result)) {
		echo '<tr>';
		echo '<td>' . $row['id_clase'] . '</td>';
		echo '<td>' . htmlspecialchars($row['unidad']) . '</td>';
		echo '<td>' . date("d/m/Y", strtotime($row['fecha'])) . '</td>';
		echo '</tr>';
	}
?>
	</table>
<?php
} else {
	echo "<p>No se encontraron clases cargadas.</p>";
}

mysqli_free_result($result);
mysqli_close($conexion);
?>