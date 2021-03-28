<?php
session_start();
create_image();
function create_image(){
    $captcha=$_SESSION['captcha'];
    $width=80;
    $height=35;
    $image=imagecreate($width,$height);
    $white =imagecolorallocate($image,255,255,255);
    $black =imagecolorallocate($image,0,0,0);
    $green =imagecolorallocate($image,0,255,0);
    $brown =imagecolorallocate($image,139,69,19);
    $orange =imagecolorallocate($image,204,204,204);
    $grey =imagecolorallocate($image,204,204,204);
    $blue =imagecolorallocate($image,0,0,204);
    imagefill($image,0,0,$white);
    $font =$_SESSION['PATH_PROJECT'].'\view\COLONNA.TTF';
    imagefttext($image,20,3,10,20,$blue,$font,$captcha);
    header("Content-Type:image/png");
     imagepng($image);
    imagedestroy($image);
    return   $_SESSION['captcha'];
}
controller::loadView('faramoshi');
?>