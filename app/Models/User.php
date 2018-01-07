<?php

class User{
    public $MaTaiKhoan;
    public $TenDangNhap;
    public $MatKhau;
    public $TenHienThi;
    public $NgaySinh;
    public $DiaChi;
    public $DienThoai;
    public $Email;
    public $BiXoa;
    public $MaLoaiTaiKhoan;
    public $TenLoaiTaiKoan;

    public function FromJson($obj){
        $data = json_decode($obj,true);
        foreach($data as $key => $val)
        {
            if(property_exists(__CLASS__,$key))
            {
                $this->$key =  $val;
            }
        }
    }

    public function save(){
        if($this->MaTaiKhoan == null):
            $sql = "INSERT INTO taikhoan VALUES (null,'$this->TenDangNhap','$this->MatKhau','$this->TenHienThi','$this->NgaySinh'
            ,'$this->DiaChi',$this->DienThoai,'$this->Email','$this->BiXoa',
            '$this->MaLoaiTaiKhoan')";
        else:
            $sql = "UPDATE taikhoan
                    SET TenDangNhap = '$this->TenDangNhap',
                        MatKhau = '$this->MatKhau',
                        TenHienThi = '$this->TenHienThi',
                        NgaySinh = '$this->NgaySinh',
                        DiaChi = '$this->DiaChi',
                        DienThoai = '$this->DienThoai',
                        Email = '$this->Email', BiXoa = '$this->BiXoa',
                        MaLoaiTaiKhoan = '$this->MaLoaiTaiKhoan'
                    WHERE MaTaiKhoan = $this->MaTaiKhoan";
        endif;

        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function delete(){
       $sql = "DELETE FROM taikhoan WHERE MaTaiKhoan = $this->MaTaiKhoan";
       if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public static function find($id){
        $sql = "SELECT * FROM taikhoan WHERE MaTaiKhoan = $id AND BiXoa = FALSE LIMIT 1";
        if($data = Provider::ExecuteQuery($sql)){
            $item = new User;
            while($row = mysqli_fetch_array($data)){
                $item->MaTaiKhoan = $row['MaTaiKhoan'];
                $item->TenDangNhap = $row['TenDangNhap'];
                $item->MatKhau = $row['MatKhau'];
                $item->TenHienThi = $row['TenHienThi'];
                $item->NgaySinh = $row['NgaySinh'];
                $item->DiaChi = $row['DiaChi'];
                $item->DienThoai = $row['DienThoai'];
                $item->Email = $row['Email'];
                $item->BiXoa = $row['BiXoa'];
                $item->MaLoaiTaiKhoan = $row['MaLoaiTaiKhoan'];
            }
            return $item;
        }
    }

    public static function findByUserName($id){
        $sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '$id' AND BiXoa = FALSE LIMIT 1";
        if($data = Provider::ExecuteQuery($sql)){
            $item = new User;
            while($row = mysqli_fetch_array($data)){
                $item->MaTaiKhoan = $row['MaTaiKhoan'];
                $item->TenDangNhap = $row['TenDangNhap'];
                $item->MatKhau = $row['MatKhau'];
                $item->TenHienThi = $row['TenHienThi'];
                $item->NgaySinh = $row['NgaySinh'];
                $item->DiaChi = $row['DiaChi'];
                $item->DienThoai = $row['DienThoai'];
                $item->Email = $row['Email'];
                $item->BiXoa = $row['BiXoa'];
                $item->MaLoaiTaiKhoan = $row['MaLoaiTaiKhoan'];
            }
            return $item;
        }
    }

    public static function all($num = 0){
        $sl = $num !=0 ? "LIMIT $num": "";
        $sql = "SELECT TK.MaTaiKhoan, TK.TenDangNhap,TK.TenHienThi, TK.DiaChi,
                        TK.DienThoai, TK.Email, TK.MaLoaiTaiKhoan, LTK.TenLoaiTaiKhoan
                FROM taikhoan TK, loaitaikhoan LTK
                WHERE TK.MaLoaiTaiKhoan = LTK.MaLoaiTaiKhoan".$sl;
        if($data = Provider::ExecuteQuery($sql))
            return self::convert($data);
    }

    public static function getByType($id){
        $sql = "SELECT MaTaiKhoan, TenDangNhap, DiaChi, DienThoai, Email, MaLoaiTaiKhoan
                FROM taikhoan
                WHERE MaTaiKhoan = $id AND BiXoa = FALSE LIMIT 0, 10";
        if($data = Provider::ExecuteQuery($sql))
            return self::convert($data);
    }


    static function convert($data){
        $result = array();
        while($row = mysqli_fetch_array($data)){
            $item = new User;
            $item->MaTaiKhoan = $row['MaTaiKhoan'];
            $item->TenDangNhap = $row['TenDangNhap'];
            $item->TenHienThi = $row['TenHienThi'];
            $item->DiaChi = $row['DiaChi'];
            $item->DienThoai = $row['DienThoai'];
            $item->Email = $row['Email'];
            $item->MaLoaiTaiKhoan = $row['MaLoaiTaiKhoan'];
            $item->TenLoaiTaiKhoan = $row['TenLoaiTaiKhoan'];
            $result[] = $item;
        }
        return $result;
    }
}