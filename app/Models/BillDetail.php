<?php

class BillDetail{
    public $MaCTHD;
    public $SoLuong;
    public $GiaBan;
    public $MaHD;
    public $MaSP;

    public function save(){
        if(!$this->MaCTHD)
            $sql = "INSERT INTO chitietdondathang VALUES(null,'$this->SoLuong','$this->GiaBan','$this->MaHD','$this->MaSP')";
        else
            $sql = "UPDATE chitietdondathang 
                    SET SoLuong = '$this->SoLuong', GiaBan = '$this->GiaBan',
                        MaDonDatHang = '$this->MaHD', MaSanPham = '$this->MaSP'
                    WHERE MaMaChiTietDonDatHang = $this->MaCTHD";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function delete(){
        $sql = "DELETE FROM chitietdondathang WHERE MaChiTietDonDatHang = $this->MaCTHD";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function find($id){
        $sql = "SELECT * FROM chitietdondathang WHERE MaChiTietDonDatHang = $id LIMIT 1";
        if($data = Provider::ExecuteQuery($sql)){
            $item = new BillDetail;
            while($row = mysqli_fetch_array($data)){
                $item->MaCTHD = $row['MaChiTietDonDatHang'];
                $item->SoLuong = $row['SoLuong'];
                $item->GiaBan = $row['GiaBan'];
                $item->MaHD = $row['MaDonDatHang'];
                $item->MaSP = $row['MaSanPham'];
            }
            return $item;
        }
    }

    public static function all(){
        $sql = "SELECT BD.MaChiTietDonDatHang,BD.SoLuong,BD.GiaBan,BD.MaDonDatHang,BD.MaSanPham
                FROM chitietdondathang BD";
        if($data = Provider::ExecuteQuery($sql))
            return self::convert($data);
    }

    static function convert($data){
        $result = array();
        while($row = mysqli_fetch_array($data)){
            $item = new BillDetail;
            $item->MaCTHD = $row['MaChiTietDonDatHang'];
            $item->SoLuong = $row['SoLuong'];
            $item->GiaBan = $row['GiaBan'];
            $item->MaHD = $row['MaDonDatHang'];
            $item->MaSP = $row['MaSanPham'];
            $result[] = $item;
        }
        return $result;
    }
}