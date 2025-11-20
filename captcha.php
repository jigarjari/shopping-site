<?php
    session_start();
    $c = rand(100000,999999);
    $_SESSION["code"] = $c;
    //echo $c;
    $width=70;
    $height= 25;
    $img = imagecreate($width,$height);
    $white = imagecolorallocate($img,255,255,255);
    $black = imagecolorallocate($img,0,0,0);
    
    $fontsize = 14;
    imagestring($img,$fontsize,8,5, $c, $black);
    imagejpeg($img);
?>