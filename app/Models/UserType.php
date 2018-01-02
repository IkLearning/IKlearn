<?php

class UserType{
    public $MaLoaiTaiKhoan;
    public $TenLoaiTaiKhoan;

    public function save(){
        if(!$this->MaLoaiSP)
            $sql = "INSERT INTO loaitaikhoan VALUES(null,'$this->TenLoaiTaiKhoan')";
        else
            $sql = "UPDATE loaitaikhoan SET TenLoaiTaiKhoan = '$this->TenLoaiTaiKhoan' WHERE MaLoaiTaiKhoan = $this->MaLoaiTaiKhoan";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function delete(){
        $sql = "DELETE FROM loaitaikhoan WHERE MaLoaiTaiKhoan = $this->MaLoaiTaiKhoan";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function find($id){
        $sql = "SELECT MaLoaiTaiKhoan,TenLoaiTaiKhoan FROM loaitaikhoan WHERE MaLoaiTaiKhoan = $id LIMIT 1";
        if($data = Provider::ExecuteQuery($sql)){
            $item = new Product;
            while($row = mysqli_fetch_array($data)){
                $item->MaLoaiTaiKhoan = $row['MaLoaiTaiKhoan'];
                $item->TenLoaiTaiKhoan = $row['TenLoaiTaiKhoan'];
            }
            return $item;
        }
    }

    public static function all(){
        $sql = "SELECT MaLoaiTaiKhoan, TenLoaiTaiKhoan
                FROM loaitaikhoan";
        if($data = Provider::ExecuteQuery($sql))
            return self::convert($data);
    }

    static function convert($data){
        $result = array();
        while($row = mysqli_fetch_array($data)){
            $item = new UserType;
            $item->MaLoaiTaiKhoan = $row['MaLoaiTaiKhoan'];
            $item->TenLoaiTaiKhoan = $row['TenLoaiTaiKhoan'];
            $result[] = $item;
        }
        return $result;
    }
}