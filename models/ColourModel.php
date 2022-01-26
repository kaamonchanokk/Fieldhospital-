<?php
class Colour
{
    public $C_Id,$C_Name;

    public function __construct($c_id,$c_name)
    {
        $this->C_Id= $c_id;
        $this->C_Name= $c_name;
    }

    public static function getAll()
    {
        $colourList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Colour";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $c_id = $my_row[C_Id];
            $c_name = $my_row[C_Name];
            $colourList[] = new Colour($c_id,$c_name);
        }
        require("connection_close.php");
        return $colourList;
    }
}