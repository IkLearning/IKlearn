<?php

class View{
    public $inherit;
    public $partial;
    public function __construct(){

    }

    public function Init(){
        if($this->inherit != null):
            require('app/Views/'.str_replace('.','/',$this->inherit).'.php');
        else:
            require('app/Views/'.str_replace('.','/',$this->partial).'.php');
        endif;
    }

    public function extends($view){
        $this->inherit = $view;
    }

    public function render($view){
        $this->partial = $view;
    }

}
