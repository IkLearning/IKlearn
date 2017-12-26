<?php

class Bootstrap{
    public function __construct(){
        //1. router
        $tokens = explode('/',rtrim($_SERVER['REQUEST_URI'],'/'));


        //2. Dispatcher
        $controllerName = ucfirst($tokens[1].'Controller');
        if(file_exists('app/Controllers/'.$controllerName .'.php')):
            require_once('app/Controllers/'.$controllerName .'.php');
            $controller = new $controllerName;
            if(isset($tokens[3])):
                $request = $tokens[3];
            endif;
            if(isset($tokens[2])):
                $action = $tokens[2];
                $controller->{$action}($request?? null);
            else:
                $controller->index($request ?? null);
            endif;
        endif;

    }
}