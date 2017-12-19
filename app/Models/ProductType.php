<?php

class ProductType{
    public $MaLoaiSP;
    public $TenLoaiSP;
    public $BiXoa;

    public function save(){
        if(!$this->MaLoaiSP)
            $sql = "INSERT INTO loaisanpham VALUES(null,'$this->TenLoaiSP','$this->BiXoa')";
        else
            $sql = "UPDATE loaisanpham SET TenLoaiSanPham = '$this->TenLoaiSP', BiXoa = '$this->BiXoa' WHERE MaLoaiSanPham = $this->MaLoaiSP";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function delete(){
        $sql = "DELETE FROM loaisanpham WHERE MaLoaiSanPham = $this->MaLoaiSP";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function find($id){
        $sql = "SELECT TenLoaiSanPham FROM loaisanpham WHERE MaLoaiSanPham = $id AND BiXoa = FALSE LIMIT 1";
        if($data = Provider::ExecuteNonQuery($sql)){
            $item = new Product;
            while($row = mysqli_fetch_array($data)){
                $item->MaLoaiSP = $row['MaLoaiSanPham'];
            }
            return $item;
        }
    }

    public static function all(){
        $sql = "SELECT SP.MaLoaiSanPham,SP.TenLoaiSanPham
                FROM loaisanpham SP
                WHERE SP.BiXoa = FALSE";
        if($data = Provider::ExecuteNonQuery($sql))
            return self::convert($data);
    }

    static function convert($data){
        $result = array();
        while($row = mysqli_fetch_array($data)){
            $item = new ProductType;
            $item->MaLoaiSP = $row['MaLoaiSanPham'];
            $item->TenLoaiSP = $row['TenLoaiSanPham'];
            $result[] = $item;
        }
        return $result;
    }
}