<?php
require_once('libs/autoload.php');

class AuthController extends Controller{
    

    public function login(){
        return $this->view('auth.login',null);
    }

    public function submitLogin(){
        if(isset($_POST['username']) && isset($_POST['password']))
            if(Auth::login($_POST['username'],$_POST['password'])){
                echo '0';
                return;
            }
        echo '1';
    }

    public function save(){
        $user = new User;
        $user->FromJson($_POST['usr']);
        $user->MatKhau = md5($_POST['usr']['matkhau']);
        if($user->save())
            echo '0';
        else
            echo '1';
    }

    public function find(){
        $item = User::findByUsername($_POST['tendangnhap']);
        if($item->TenDangNhap != null)
            echo '0';
        else
            echo '1';
           
    }

    public function logout(){
        Auth::logout();
        header("location:login");
    }

}
