<?php
class Supportpatient
{
    public $ID_Sup,$Date_Sup,$Time_Sup,$P_Sup,$ID_Hb,$Name_Fh,$C_hb,$PS_name;

    public function __construct($id_sup,$date_sup,$time_sup,$p_sup,$id_hb,$name_fh,$c_hb,$c_name,$ps_name)
    {
        $this->ID_Sup= $id_sup;
        $this->Date_Sup= $date_sup;
        $this->Time_Sup= $time_sup;
        $this->P_Sup= $p_sup;
        $this->ID_Hb= $id_hb;
        $this->Name_Fh= $name_fh;
        $this->C_Hb= $c_hb;
        $this->C_Name = $c_name;
        $this->PS_name= $ps_name;
    }

    public static function getAll()
    {
        $supportpatientList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Supportpatient INNER JOIN Person ON Person.PS_id = Supportpatient.P_Sup NATURAL JOIN Fieldhospitalbed NATURAL JOIN Fieldhospital INNER JOIN Colour ON Fieldhospitalbed.C_Hb=Colour.C_Id ORDER BY ID_Sup";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {

            $id_sup = $my_row[ID_Sup];
            $date_sup = $my_row[Date_Sup];
            $time_sup = $my_row[Time_Sup];

            $p_sup = $my_row[P_Sup];
            $id_hb = $my_row[ID_Hb];

            $name_fh = $my_row[Name_Fh];
            $c_hb = $my_row[C_Hb];
            $c_name = $my_row[C_Name];

            $ps_name = $my_row[PS_name];
            
            $supportpatientList[] = new Supportpatient($id_sup,$date_sup,$time_sup,$p_sup,$id_hb,$name_fh,$c_hb,$c_name,$ps_name);
        }
        require("connection_close.php");
        return $supportpatientList;
    }

    public static function search($key)
    {
        $supportpatientList = [];
        require("connection_connect.php");
        $sql="SELECT * FROM Supportpatient INNER JOIN Person ON Person.PS_id = Supportpatient.P_Sup NATURAL JOIN Fieldhospitalbed NATURAL JOIN Fieldhospital INNER JOIN Colour ON Fieldhospitalbed.C_Hb=Colour.C_Id WHERE (ID_Sup like '%$key%' or PS_name like '%$key%' or Name_Fh like '%$key%' or C_Name like '%$key%' or date_sup like '%$key%' or time_sup like '%$key%') ORDER BY ID_Sup";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $id_sup = $my_row[ID_Sup];
            $date_sup = $my_row[Date_Sup];
            $time_sup = $my_row[Time_Sup];

            $p_sup = $my_row[P_Sup];
            $id_hb = $my_row[ID_Hb];

            $name_fh = $my_row[Name_Fh];
            $c_hb = $my_row[C_Hb];
            $c_name = $my_row[C_Name];

            $ps_name = $my_row[PS_name];
            
            $supportpatientList[] = new Supportpatient($id_sup,$date_sup,$time_sup,$p_sup,$id_hb,$name_fh,$c_hb,$c_name,$ps_name);
        }
        require("connection_close.php");
        return $supportpatientList;

    }

    public static function get($id)
    {
        require("connection_connect.php");
        $sql="SELECT * FROM Supportpatient INNER JOIN Person ON Person.PS_id = Supportpatient.P_Sup NATURAL JOIN Fieldhospitalbed NATURAL JOIN Fieldhospital INNER JOIN Colour ON Fieldhospitalbed.C_Hb=Colour.C_Id WHERE ID_Sup='$id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();

        $id_sup = $my_row[ID_Sup];
        $date_sup = $my_row[Date_Sup];
        $time_sup = $my_row[Time_Sup];

        $p_sup = $my_row[P_Sup];
        $id_hb = $my_row[ID_Hb];
        $c_name = $my_row[C_Name];
        $name_fh = $my_row[Name_Fh];
        $c_hb = $my_row[C_Hb];

        $ps_name = $my_row[PS_name];

        require("connection_close.php");
        return new Supportpatient($id_sup,$date_sup,$time_sup,$p_sup,$id_hb,$name_fh,$c_hb,$c_name,$ps_name);

    }

    public static function Add($date_sup,$time_sup,$p_sup,$id_hb)
    { 
       require("connection_connect.php");
       $sql = "INSERT INTO `Supportpatient` (`ID_Sup`, `Date_Sup`, `Time_Sup`, `P_Sup`, `ID_Hb`) VALUES (NULL, '$date_sup', '$time_sup', '$p_sup', '$id_hb')";
       $result = $conn->query($sql);
       require("connection_close.php");
       return  ;
    }

    public static function update($date_sup,$time_sup,$p_sup,$id_hb,$oldid)
    {
       require("connection_connect.php");
       $sql="UPDATE `Supportpatient` SET `Date_Sup`='$date_sup',`Time_Sup`='$time_sup',
       `P_Sup`='$p_sup',`ID_Hb`='$id_hb' WHERE ID_Sup = '$oldid'";
       $result=$conn->query($sql);
       require("connection_close.php");
       return ;
    }
    public static function delete($id)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM Supportpatient WHERE ID_Sup = '$id'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return ;
    }
}