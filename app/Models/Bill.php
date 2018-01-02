<?php

class Bill{
    public $MaHD;
    public $NgayLap;
    public $TongTien;
    public $MaTK;
    public $MaTinhTrang;

    public function save(){
        if(!$this->MaLoaiSP)
            $sql = "INSERT INTO dondathang VALUES(null,'$this->NgayLap','$this->TongTien','$this->MaTK','$this->MaTinhTrang')";
        else
            $sql = "UPDATE dondathang 
                    SET NgayLap = '$this->NgayLap', TongThanhTien = '$this->TongTien',
                        MaTaiKhoan = '$this->MaTK', MaTinhTrang = '$this->MaTinhTrang'
                    WHERE MaDonDatHang = $this->MaHD";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function delete(){
        $sql = "DELETE FROM dondathang WHERE MaDonDatHang = $this->MaHD";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function find($id){
        $sql = "SELECT * FROM dondathang WHERE MaDonDatHang = $id LIMIT 1";
        if($data = Provider::ExecuteQuery($sql)){
            $item = new Bill;
            while($row = mysqli_fetch_array($data)){
                $item->MaHD = $row['MaDonDatHang'];
                $item->NgayLap = $row['NgayLap'];
                $item->TongTien = $row['TongThanhTien'];
                $item->MaTK = $row['MaTaiKhoan'];
                $item->MaTinhTrang = $row['MaTinhTrang'];
            }
            return $item;
        }
    }

    public static function all(){
        $sql = "SELECT B.MaDonDatHang,B.NgayLap,B.TongThanhTien,B.MaTaiKhoan,B.MaTinhTrang
                FROM dondathang B";
        if($data = Provider::ExecuteQuery($sql))
            return self::convert($data);
    }

    static function convert($data){
        $result = array();
        while($row = mysqli_fetch_array($data)){
            $item = new Bill;
            $item->MaHD = $row['MaDonDatHang'];
            $item->NgayLap = $row['NgayLap'];
            $item->TongTien = $row['TongThanhTien'];
            $item->MaTK = $row['MaTaiKhoan'];
            $item->MaTinhTrang = $row['MaTinhTrang'];
            $result[] = $item;
        }
        return $result;
    }
}