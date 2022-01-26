<?php
class Fieldhospital
{
    public $ID_Fh,$A_Fh,$Name_Fh,$Address_Fh,$Name_A,$Date_Fh;

    public function __construct($id_fh,$a_fh,$name_fh,$address_fh,$name_a,$date_fh)
    {
        $this->ID_Fh= $id_fh;
        $this->A_Fh= $a_fh;
        $this->Name_Fh= $name_fh;
        $this->Address_Fh= $address_fh;
        $this->Name_A= $name_a;
        $this->Date_Fh= $date_fh;
    }

    public static function getAll()
    {
        $FieldhospitalList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Fieldhospital INNER JOIN Agency ON Fieldhospital.A_Fh = Agency.A_ID ORDER BY ID_Fh";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $id_fh = $my_row[ID_Fh];
            $a_fh = $my_row[A_Fh];
            $name_fh = $my_row[Name_Fh];
            $address_fh = $my_row[Address_Fh];
            $name_a = $my_row[A_Name];
            $date_fh = $my_row[Date_Fh];

            $FieldhospitalList[] = new Fieldhospital($id_fh,$a_fh,$name_fh,$address_fh,$name_a,$date_fh);
        }
        require("connection_close.php");
        return $FieldhospitalList;
    }
    public static function search($key)
    {
        require("connection_connect.php");
        $sql="SELECT * FROM Fieldhospital INNER JOIN Agency ON Fieldhospital.A_Fh = Agency.A_ID WHERE (ID_Fh like '%$key%' or A_name like '%$key%' or Name_Fh like '%$key%' or Address_Fh like '%$key%') ORDER BY ID_Fh";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $id_fh = $my_row[ID_Fh];
            $a_fh = $my_row[A_Fh];
            $name_fh = $my_row[Name_Fh];
            $address_fh = $my_row[Address_Fh];
            $name_a = $my_row[A_Name];
            $date_fh = $my_row[Date_Fh];

            $FieldhospitalList[] = new Fieldhospital($id_fh,$a_fh,$name_fh,$address_fh,$name_a,$date_fh);
        }
        require("connection_close.php");
        return $FieldhospitalList;

    }

    public static function get($id)
    {
        require("connection_connect.php");
        $sql="SELECT * FROM Fieldhospital INNER JOIN Agency ON Fieldhospital.A_Fh = Agency.A_ID WHERE ID_Fh ='$id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
        
        $id_fh = $my_row[ID_Fh];
        $a_fh = $my_row[A_Fh];
        $name_fh = $my_row[Name_Fh];
        $address_fh = $my_row[Address_Fh];
        $name_a = $my_row[A_Name];
        $date_fh = $my_row[Date_Fh];

        require("connection_close.php");
        return new Fieldhospital($id_fh,$a_fh,$name_fh,$address_fh,$name_a,$date_fh);

    }
    public static function Add($id_fh,$name_fh,$address_fh,$a_name,$date_fh)
    { 
       require("connection_connect.php");
       $sql = "INSERT INTO `Fieldhospital` (`ID_Fh`, `Name_Fh`, `Address_Fh`, `A_Fh`, `Date_Fh`) VALUES ('$id_fh', '$name_fh', '$address_fh', '$a_name','$date_fh')";
       $result = $conn->query($sql);
       require("connection_close.php");
       return  ;
    }
    public static function update($id_fh,$name_fh,$address_fh,$a_id,$date_fh,$oldid)
     {
        require("connection_connect.php");
        $sql="UPDATE `Fieldhospital` SET `ID_Fh`='$id_fh',`Name_Fh`='$name_fh',
        `Address_Fh`='$address_fh',`A_Fh`='$a_id',`Date_Fh`='$date_fh' WHERE ID_Fh = '$oldid'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return ;
     }
     public static function delete($id)
     {
         require("connection_connect.php");
         $sql = "DELETE FROM Fieldhospital WHERE ID_Fh = '$id'";
         $result = $conn->query($sql);
         require("connection_close.php");
         return ;
     }
     public static function check($getid_fh,$getname_fh)
     {
        $s = a;
        require("connection_connect.php");
        $sql = "SELECT * FROM Fieldhospital INNER JOIN Agency ON Fieldhospital.A_Fh = Agency.A_ID";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $id_fh = $my_row[ID_Fh];
            $name_fh = $my_row[Name_Fh];
            if($getname_fh===$name_fh)
            {
                    $s=$getname_fh;
                    break;
            }
            else if($getid_fh===$id_fh)
            {
                $s=$getid_fh;
                break;
            }
        }
        require("connection_close.php");
        return $s;
     } 
}