<?php
require_once('app/config.php');
class Provider{
    public $con;
    public function __construct(){
        $this->con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $this->con->set_charset("utf8");
    }
    public function Connect(){
        if($this->con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)){
            $this->con->set_charset("utf8");
            return true;
        }
        return false;
    }

    public static function ExecuteNonQuery($sql){
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $con->set_charset("utf8");
        if($result = mysqli_query($con,$sql))
            return $result;
    }
}