<?php

class BillState{
    public $MaTinhTrang;
    public $TenTinhTrang;

    public function save(){
        if(!$this->MaTinhTrang)
            $sql = "INSERT INTO tinhtrang VALUES(null,'$this->TenTinhTrang')";
        else
            $sql = "UPDATE tinhtrang SET TenTinhTrang = '$this->TenTinhTrang' WHERE MaTinhTrang = '$this->MaTinhTrang'";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public function delete(){
        $sql = "DELETE FROM tinhtrang WHERE MaTinhTrang = $this->MaTinhTrang";
        if(Provider::ExecuteNonQuery($sql))
            return true;
    }

    public static function all(){
        $sql = "SELECT TT.MaTinhTrang,TT.TenTinhTrang
                FROM tinhtrang TT";
        if($data = Provider::ExecuteQuery($sql))
            return self::convert($data);
    }

    static function convert($data){
        $result = array();
        while($row = mysqli_fetch_array($data)){
            $item = new BillState;
            $item->MaTinhTrang = $row['MaTinhTrang'];
            $item->TenTinhTrang = $row['TenTinhTrang'];
            $result[] = $item;
        }
        return $result;
    }
}