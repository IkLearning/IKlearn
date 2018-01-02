<?php

class Auth{
    public $username;
    public $password;
    public $displayName;
    public $role;
    public $roleName;

    public static function login($username,$password){
        $md5_password = md5($password);
        $sql = "SELECT TK.TenDangNhap,TK.MatKhau,TK.TenHienThi,TK.MaLoaiTaiKhoan,LTK.TenLoaiTaiKhoan
                FROM taikhoan TK, loaitaikhoan LTK
                WHERE TK.TenDangNhap = '$username' AND TK.MatKhau = '$md5_password' AND TK.MaLoaiTaiKhoan = LTK.MaLoaiTaiKhoan";
        if($result = Provider::ExecuteQuery($sql))
        {
            if(($num_row = mysqli_num_rows($result)) > 0)
            {
                $data = mysqli_fetch_array($result);
                $auth = new Auth;
                $auth->username = $data['TenDangNhap'];
                $auth->password = $data['MatKhau'];
                $auth->displayName = $data['TenHienThi'];
                $auth->role = $data['MaLoaiTaiKhoan'];
                $auth->roleName = $data['TenLoaiTaiKhoan'];
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