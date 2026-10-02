<?php
	$image     = "../img/unidad4.png";
	$watermark = "../img/marca_agua.png";

	if (!file_exists($image) || !file_exists($watermark)) {
		die("Falta el archivo $image o $watermark");
	}
	
	// Se carga la imagen (../img/unidad4.png)
	$imBase = imagecreatefrompng($image) or die("Error al abrir $image");
	imagepalettetotruecolor($imBase);

	// Creamos la marca de agua
	$imMarca = imagecreatefrompng($watermark) or die("Error al abrir $watermark");

	$anchoMarca = imagesx($imMarca);
	$altoMarca  = imagesy($imMarca);

	$cut = imagecreatetruecolor($anchoMarca, $altoMarca);

	$x = intval((imagesx($imBase) - $anchoMarca) / 2);
	$y = intval((imagesy($imBase) - $altoMarca) / 2);

	imagecopy($cut, $imBase, 0, 0, $x, $y, $anchoMarca, $altoMarca);

	imagecopy($cut, $imMarca, 0, 0, 0, 0, $anchoMarca, $altoMarca);

	$opacidad = 12;
	imagecopymerge($imBase, $cut, $x, $y, 0, 0, $anchoMarca, $altoMarca, $opacidad);

	// Generar la imagen final
	header("Content-Type: image/png");
	imagepng($imBase);

	imagedestroy($imBase);
	imagedestroy($imMarca);
	imagedestroy($cut);
?>