<?php

class Bill{
    public $MaHD;
    public $NgayLap;
    public $TongTien;
    public $MaTK;
    public $MaTinhTrang;
    public $TenTinhTrang;

    public function save(){
        if(!$this->MaHD){
            $lastID = "HD1";
            if($lastRecord = Provider::ExecuteQuery(
                "SELECT MAX(CAST(SUBSTRING(MaDonDatHang, 3) AS INT)) AS maxid FROM dondathang"
                )){
                if(mysqli_num_rows($lastRecord) > 0){
                    $row = mysqli_fetch_array($lastRecord);
                    $lastID = $row['maxid'];
                }
            }
            $lastID = "HD".($lastID+1);
            $this->MaHD = $lastID;
            $sql = "INSERT INTO dondathang VALUES('$this->MaHD','$this->NgayLap',$this->TongTien,$this->MaTK,$this->MaTinhTrang)";
        }else
            $sql = "UPDATE dondathang 
                    SET NgayLap = '$this->NgayLap', TongThanhTien = '$this->TongTien',
                        MaTaiKhoan = '$this->MaTK', MaTinhTrang = '$this->MaTinhTrang'
                    WHERE MaDonDatHang = '$this->MaHD'";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function delete(){
        $sql = "DELETE FROM dondathang WHERE MaDonDatHang = $this->MaHD";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public static function find($id){
        $sql = "SELECT * FROM dondathang WHERE MaDonDatHang = '$id' LIMIT 1";
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

    public static function getByUserID($id){
        $sql = "SELECT B.MaDonDatHang,B.NgayLap,B.TongThanhTien,B.MaTaiKhoan,B.MaTinhTrang,TT.TenTinhTrang
                FROM dondathang B, tinhtrang TT
                WHERE B.MaTinhTrang = TT.MaTinhTrang AND B.MaTaiKhoan = '$id'
                ORDER BY B.NgayLap DESC";
        if($data = Provider::ExecuteQuery($sql))
            return self::convert($data);
    }

    public static function all(){
        $sql = "SELECT B.MaDonDatHang,B.NgayLap,B.TongThanhTien,B.MaTaiKhoan,B.MaTinhTrang,TT.TenTinhTrang
                FROM dondathang B, tinhtrang TT
                WHERE B.MaTinhTrang = TT.MaTinhTrang";
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
            $item->TenTinhTrang = $row['TenTinhTrang'];
            $result[] = $item;
        }
        return $result;
    }
}