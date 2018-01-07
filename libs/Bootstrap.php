<?php
class Bootstrap{
    public function __construct(){
        //1. router
        $tokens = explode('/',rtrim($_SERVER['REQUEST_URI'],'/'));
        //2. Dispatcher
        if(count($tokens) == 1):
            require_once('app/Controllers/PageController.php');
            $home = new PageController;
            $home->index();
        else:
            $controllerName = ucfirst($tokens[1].'Controller');
            if(file_exists('app/Controllers/'.$controllerName .'.php')):
                require_once('app/Controllers/'.$controllerName .'.php');
                $controller = new $controllerName;
                if(isset($tokens[3])):
                    $request = $tokens[3];
                endif;
                if(isset($tokens[2])):
                    $action = strtok($tokens[2],'?');
                    if(!method_exists($controller,$action)):
                        Error();
                        return;
                    endif;
                    $controller->{$action}($request?? null);
                else:
                    $controller->index($request ?? null);
                endif;
            else:
                Error();
            endif;
        endif;
    }
}

function Error(){
    require_once('app/Controllers/ErrorController.php');
    $error = new ErrorController;
    $error->index();
}