<?php

session_start();
header("Content-type: image/png");

$im = @imagecreate(200, 200) or die("Cannot Initialize new GD image stream");

$background_color = imagecolorallocate($im, 255, 255, 0);    // yellow
$blue = imagecolorallocate($im, 0, 0, 255);                  // blue


#change the length value to increase the number of captcha code that will be displayed

#generates random string
function generateRandomString($length=3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$captcha = generateRandomString();
imagestring($im, 3, 5, 5,  $captcha, $blue);

imagepng($im);
imagedestroy($im);


#The correct captcha word is saved to session so that we can test it with the supplied captcha from the user
$_SESSION['capt'] = $captcha;



?>