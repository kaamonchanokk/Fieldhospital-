<?php
class Agency
{
    public $A_ID,$A_name;

    public function __construct($a_id,$a_name)
    {
        $this->A_ID= $a_id;
        $this->A_name= $a_name;
    }

    public static function getAll()
    {
        $agencyList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Agency";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $a_id = $my_row[A_ID];
            $a_name = $my_row[A_Name];
            $agencyList[] = new Agency($a_id,$a_name);
        }
        require("connection_close.php");
        return $agencyList;
    }
}