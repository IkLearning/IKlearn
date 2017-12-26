<?php
function autoloader($className){
    $dirs = array('','app/Models/','libs/','app/Services/','app/');
    $formats = array('%s.php');

    foreach ($dirs as $dir) {
        foreach($formats as $format){
            $path = $dir.sprintf($format,$className);
            if(file_exists($path)):
                include($path);
                return;
            endif;
        }
    }
    echo $path;
}

spl_autoload_register('autoloader');
