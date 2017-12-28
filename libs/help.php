<?php
require_once('app/config.php');
// website url
function base_url(){
    return $url = HTTP_SERVER;
}

// asset path

function asset(){
    return base_url().'app/public/';
}

//storage path
function storage(){
    return base_url().'app/public/uploads/';
}

//route path
function route($controller,$action,$param = null){
    if($param == null)
        return base_url().$controller.'/'.$action;
    return base_url().$controller.'/'.$action.'/'.$param;
}
