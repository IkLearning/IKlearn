<?php

class Session{
    private static function start(){
        if (session_status() == PHP_SESSION_NONE)
            session_start();
    }

    public static function has($name){
        self::start();
        if(isset($_SESSION[$name]))
            return true;
        return false;
    }

    public static function get($name){
        self::start();
        return $_SESSION[$name];
    }

    public static function put($name,$value){
        self::start();
        $_SESSION[$name] = $value;
    }

    public static function forget($name){
        self::start();
        unset($_SESSION[$name]);
    }

    public static function flush(){
        self::start();
        session_destroy();
    }
}