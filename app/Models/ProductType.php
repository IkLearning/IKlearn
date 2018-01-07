<?php

class ProductType{
    public $MaLoaiSP;
    public $TenLoaiSP;
    public $BiXoa;

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
        if($this->MaLoaiSP == null)
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

    public static function find($id){
        $sql = "SELECT MaLoaiSanPham,TenLoaiSanPham FROM loaisanpham WHERE MaLoaiSanPham = $id AND BiXoa = FALSE LIMIT 1";
        if($data = Provider::ExecuteQuery($sql)){
            $item = new ProductType;
            while($row = mysqli_fetch_array($data)){
                $item->MaLoaiSP = $row['MaLoaiSanPham'];
                $item->TenLoaiSP = $row['TenLoaiSanPham'];
            }
            return $item;
        }
    }

    public static function all(){
        $sql = "SELECT SP.MaLoaiSanPham,SP.TenLoaiSanPham
                FROM loaisanpham SP
                WHERE SP.BiXoa = FALSE";
        if($data = Provider::ExecuteQuery($sql))
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