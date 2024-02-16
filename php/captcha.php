<?php

session_start();

$_SESSION['captcha'] = mt_rand(1000,9999);
$img = imagecreate(75,30);
$font = '../font/FiraSans-Medium.ttf';

$bg = imagecolorallocate($img, 255,255,255);
$textcolor = imagecolorallocate($img, 0, 0, 0);

imagettftext($img, 23, 0, 4, 27, $textcolor, $font, $_SESSION['captcha']);

header('content-type:image/jpeg');
imagejpeg($img);
imagedestroy($img);
?>