<?php
class Person
{
    public $PS_id,$PS_name;

    public function __construct($ps_id,$ps_name)
    {
        $this->PS_id= $ps_id;
        $this->PS_name= $ps_name;
    }

    public static function getAll()
    {
        $personList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Person";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ps_id = $my_row[PS_id];
            $ps_name = $my_row[PS_name];
            $personList[] = new Person($ps_id,$ps_name);
        }
        require("connection_close.php");
        return $personList;
    }
}