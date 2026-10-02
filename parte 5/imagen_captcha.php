<?php
session_start();

// Generación de caracteres aleatorios
$numero1 = rand(0, 9);
$numero2 = rand(0, 9);
$minus   = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$mayus   = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

$gen_min = rand(0, 25);
$gen_may = rand(0, 25);

// Código dinámico de 4 caracteres
$codigo_captcha = $numero1 . $minus[$gen_min] . $mayus[$gen_may] . $numero2;

// Se almacena en la sesión para verificarlo al procesar el formulario
$_SESSION["captcha_codigo"] = $codigo_captcha;

// Generación de la imagen GD
header("Content-type: image/jpeg");
$im = @imagecreate(120, 35);

$color_fondo = imagecolorallocate($im, 240, 240, 240);
$color_texto = imagecolorallocate($im, 0, 102, 153);

imagestring($im, 5, 20, 8, $_SESSION["captcha_codigo"], $color_texto);

imagejpeg($im);
imagedestroy($im);
?>