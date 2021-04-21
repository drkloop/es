<?php

    $im = imagecreatetruecolor(100, 35);
    $white = imagecolorallocate($im, 255, 255, 255);
    $grey = imagecolorallocate($im, 128, 128, 128);
    $grey2 = imagecolorallocate($im, 240, 240, 240);
    $black = imagecolorallocate($im, 0, 0, 0);
    imagefilledrectangle($im, 0, 0, 399, 50, $grey2);
    $tex = md5(time());
    $text = $tex[9] . $tex[7] . $tex[13] . $tex[5] . $tex[3];
    $_SESSION['ReCaptCha'] = $text;
    $font = 'D:\xampp\htdocs\es.local\PanelAdmin\aller.ttf';
    imagettftext($im, 15, 5, 12, 21, $black, $font, $text);
    imagettftext($im, 15, 2, 10, 20, $grey, $font, $text);
    $image_name = 'chaptcha.png';
    imagepng($im, $image_name);
    imagedestroy($im);

?>