<?php

class Auth{
    public $username;
    public $password;
    public $displayName;
    public $role;

    public static function login($username,$password){
        $md5_password = md5($password);
        $sql = "SELECT TenDangNhap,MatKhau,TenHienThi,MaLoaiTaiKhoan
                FROM taikhoan WHERE TenDangNhap = '$username' AND MatKhau = '$md5_password'";
        if($result = Provider::ExecuteNonQuery($sql))
        {
            if(($num_row = mysqli_num_rows($result)) > 0)
            {
                $data = mysqli_fetch_array($result);
                $auth = new Auth;
                $auth->username = $data['TenDangNhap'];
                $auth->password = $data['MatKhau'];
                $auth->displayName = $data['TenHienThi'];
                $auth->role = $data['MaLoaiTaiKhoan'];
                Session::put('auth',$auth);
                return true;
            }
        }
        return false;
    }

    public static function logout(){
        Session::forget('auth');
    }


}