<?php
class Staff
{
    public $S_ID,$S_Name;

    public function __construct($s_id,$s_name)
    {
        $this->S_ID= $s_id;
        $this->S_Name= $s_name;
    }

    public static function getAll()
    {
        $staffList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Staff";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $s_id = $my_row[S_ID];
            $s_name = $my_row[S_Name];
            $staffList[] = new Staff($s_id,$s_name);
        }
        require("connection_close.php");
        return $staffList;
    }
}