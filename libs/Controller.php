<?php
require_once('libs/View.php');


class Controller{
    public function __construct(){
        $this->view = new View;
    }

    public function view($path,$extend,...$params){
        if($extend != null):
            $this->view->inherit = $extend;
            $this->view->partial = str_replace('.','/',$path).'.php';
        else:
            $this->view->partial = $path;
        endif;
        
        if($params)
            foreach ($params as $key)
                $this->view->{$key} = $this->{$key};
        $this->view->Init();
    }
}