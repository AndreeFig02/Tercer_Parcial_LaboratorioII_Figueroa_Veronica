<?php
$ruta  = "../img/unidad4.png";
$ancho = 150;
$alto  = 150;

if (!file_exists($ruta)) {
	die("No se encontró $ruta");
}
// COnfiguraciones de imagen de marca de agua (como se veria y demás)
$fuente   = imagecreatefrompng($ruta) or die("Error al abrir $ruta");
$imgAncho = imagesx($fuente);
$imgAlto  = imagesy($fuente);

$imagen = imagecreatetruecolor($ancho, $alto);
imagealphablending($imagen, false);
imagesavealpha($imagen, true);
$transparente = imagecolorallocatealpha($imagen, 0, 0, 0, 127);
imagefill($imagen, 0, 0, $transparente);

imagecopyresampled($imagen, $fuente, 0, 0, 0, 0, $ancho, $alto, $imgAncho, $imgAlto);

header("Content-Type: image/png");
imagepng($imagen);

imagedestroy($fuente);
imagedestroy($imagen);
?>