<?php
class Captcha{
    public static function new(){
        $captchanumber = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; // Initializing PHP variable with string
        $captchanumber = substr(str_shuffle($captchanumber), 0, 6); // Getting first 6 word after shuffle.
        Session::put('captcha',$captchanumber); // Initializing session variable with above generated sub-string
        $image = imagecreatefromstring(file_get_contents(asset()."source/captcha/bj.jpg"));
        $foreColor = imagecolorallocate($image, 115, 115, 115);
        $foreground = imagecolorallocate($image, 175, 199, 200); //font color
        $fontPath = file_get_contents(asset()."source/captcha/captcha.ttf",FILE_USE_INCLUDE_PATH);
        $angle = rand(-10,10);
        imagettftext($image,30,$angle,30,60,$foreColor,'captcha.ttf',$captchanumber);
        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
    }
}