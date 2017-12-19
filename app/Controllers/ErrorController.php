<?php
require_once('libs/autoload.php');

class ErrorController extends Controller{
    public function index(){
        $this->message = "The controller doesn't exist!";
        return $this->view('error.index',null,'message');
    }
}