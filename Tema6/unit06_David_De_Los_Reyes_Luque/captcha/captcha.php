<?php
session_start();
$image = @imagecreatefrompng("./captcha.png");
// Random string creation 
// mktime: Unix timestamp
$crypt = md5(mktime(time()) * rand());
// Only 5 random characters are needed.
$string = substr($crypt, 0, 5);
$height = 200;
$width = 200;
//$image = imagecreatetruecolor($width, $height); 
$white = imagecolorallocate($image, 0, 0, 0); 
$blue = imagecolorallocatealpha($image, 0, 0, 200, 127);
$font = "./Yuji_Syuku/YujiSyuku-Regular.ttf";
    // b. Drawing the image
imagefill($image, 0, 0, $blue);
imageline($image, 0, 0, $width, $height, $white); 
imagettftext($image, 74, 25, 40, 220, $white, $font, $string);
//imagestring($image, 5, 50, 150, $string, $white);
// size */
    // c. Generating the final image
header('content-type: image/png'); 
imagepng ($image); 
    // d. Freeing resources
imagedestroy($image);
$_SESSION['key'] = md5($string);
         // Return the image to display it
   header("Content-type: image/png"); 
   imagepng($captcha);
   
   //Step four.
   if ( md5($_POST['captcha']) != $_SESSION['key'] ) { die("Error: The code is not correct.");
   } else {
   echo 'Correct! You are a human.';
   }
   ?>

