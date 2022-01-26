<?php
class Fieldhospitalbed
{
    public $ID_Hb,$Max_Hb,$C_Hb,$C_Name,$ID_Fh,$Name_Fh,$Amount_Hb;

    public function __construct($id_hb,$max_hb,$c_hb,$c_name,$id_fh,$name_fh,$amount_hb)
    {
        $this->ID_Hb= $id_hb;
        $this->Max_Hb= $max_hb;
        $this->C_Hb= $c_hb;
        $this->C_Name= $c_name;
        $this->ID_Fh= $id_fh;
        $this->Name_Fh= $name_fh;
        $this->Amount_Hb= $amount_hb;
    }
    public static function getAll()
    {
        $fieldhospitalbedList = [];
        require("connection_connect.php");
        $sql = "SELECT Fieldhospitalbed.ID_Hb,Fieldhospitalbed.Max_Hb,Colour.C_Name,Fieldhospital.ID_Fh,Fieldhospital.Name_Fh,Fieldhospitalbed.Max_Hb-COUNT(Supportpatient.ID_Hb) AS Amount_Hb 
                FROM Fieldhospitalbed
                NATURAL JOIN Fieldhospital
                LEFT JOIN Colour ON Fieldhospitalbed.C_Hb = Colour.C_Id
                LEFT JOIN Supportpatient ON Fieldhospitalbed.ID_Hb = Supportpatient.ID_Hb
                GROUP BY Fieldhospitalbed.ID_Hb ORDER BY ID_Hb";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {

            $id_hb = $my_row[ID_Hb];
            $max_hb = $my_row[Max_Hb];
            $c_hb = $my_row[C_Hb];
            $c_name = $my_row[C_Name];
            $id_fh = $my_row[ID_Fh];
            $name_fh = $my_row[Name_Fh];
            $amount_hb = $my_row[Amount_Hb];
            $fieldhospitalbedList[] = new Fieldhospitalbed($id_hb,$max_hb,$c_hb,$c_name,$id_fh,$name_fh,$amount_hb);
        }
        require("connection_close.php");
        return $fieldhospitalbedList;
    }
    public static function search($key)
    {
        $fieldhospitalbedList = [];
        require("connection_connect.php");
        $sql="SELECT Fieldhospitalbed.ID_Hb,Fieldhospitalbed.Max_Hb,Colour.C_Name,Fieldhospital.ID_Fh,Fieldhospital.Name_Fh,Fieldhospitalbed.Max_Hb-COUNT(Supportpatient.ID_Hb) AS Amount_Hb 
              FROM Fieldhospitalbed
              NATURAL JOIN Fieldhospital
              LEFT JOIN Colour ON Fieldhospitalbed.C_Hb = Colour.C_Id
              LEFT JOIN Supportpatient ON Fieldhospitalbed.ID_Hb = Supportpatient.ID_Hb
              WHERE (Fieldhospitalbed.ID_Hb like '%$key%' or Fieldhospital.Name_Fh like '%$key%' or Colour.C_Name like '%$key%') GROUP BY Fieldhospitalbed.ID_Hb ORDER BY ID_Hb";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $id_hb = $my_row[ID_Hb];
            $max_hb = $my_row[Max_Hb];
            $c_hb = $my_row[C_Hb];
            $c_name = $my_row[C_Name];
            $id_fh = $my_row[ID_Fh];
            $name_fh = $my_row[Name_Fh];
            $amount_hb = $my_row[Amount_Hb];
            
            $fieldhospitalbedList[] = new Fieldhospitalbed($id_hb,$max_hb,$c_hb,$c_name,$id_fh,$name_fh,$amount_hb);
        }
        require("connection_close.php");
        return $fieldhospitalbedList;

    }
    public static function get($id)
    {
        require("connection_connect.php");
        $sql="SELECT * FROM Fieldhospitalbed NATURAL JOIN Fieldhospital
              LEFT JOIN Colour ON Fieldhospitalbed.C_Hb = Colour.C_Id WHERE ID_Hb='$id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
        $id_hb = $my_row[ID_Hb];
        $max_hb = $my_row[Max_Hb];
        $c_hb = $my_row[C_Hb];
        $c_name = $my_row[C_Name];
        $id_fh = $my_row[ID_Fh];
        $name_fh = $my_row[Name_Fh];
        $amount_hb = 0;
        require("connection_close.php");
        return new Fieldhospitalbed($id_hb,$max_hb,$c_hb,$c_name,$id_fh,$name_fh,$amount_hb);

    }
    public static function delete($id)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM Fieldhospitalbed WHERE ID_Hb = '$id'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return ;
    }
    public static function Add($name_fh,$max_hb,$c_hb)
    { 
       require("connection_connect.php");
       $sql = "INSERT INTO `Fieldhospitalbed` (`ID_Hb`, `ID_Fh`, `Max_Hb`, `C_Hb`) VALUES (NULL, '$name_fh', '$max_hb', '$c_hb')";
       $result = $conn->query($sql);
       require("connection_close.php");
       return  ;
    }
    public static function update($max_hb,$oldid)
    {
       require("connection_connect.php");
       $sql="UPDATE `Fieldhospitalbed` SET `Max_Hb`='$max_hb' WHERE ID_Hb = '$oldid'";
       $result=$conn->query($sql);
       require("connection_close.php");
       return ;
    }
    public static function check($getid_fh,$getc_hb)
    {
       $s = a;
       require("connection_connect.php");
       $sql = "SELECT * FROM Fieldhospitalbed
               NATURAL JOIN Fieldhospital
               LEFT JOIN Colour ON Fieldhospitalbed.C_Hb = Colour.C_Id
               GROUP BY Fieldhospitalbed.ID_Hb";
       $result = $conn->query($sql);
       while ($my_row = $result->fetch_assoc()) {
           $id_hb = $my_row[ID_Hb];
           $id_fh = $my_row[ID_Fh];
           $c_hb = $my_row[C_Hb];

           $c_name = $my_row[C_Name];
           $name_fh = $my_row[Name_Fh];

           if($getid_fh===$id_fh and $getc_hb===$c_hb)
           {
                   $s= $name_fh . " เตียงสี" . $c_name;
                   break;
           }
       }
       require("connection_close.php");
       return $s;
    } 
    public static function sumbed()
    {
       $bed = [];
       $bed[0]=0;
       $bed[1]=0;
       $bed[2]=0;
       $bed[3]=0;
       require("connection_connect.php");
       $sql = "SELECT Fieldhospitalbed.ID_Hb,Fieldhospitalbed.Max_Hb,Colour.C_Name,Fieldhospital.ID_Fh,Fieldhospital.Name_Fh,Fieldhospitalbed.Max_Hb-COUNT(Supportpatient.ID_Hb) AS Amount_Hb 
                FROM Fieldhospitalbed
                NATURAL JOIN Fieldhospital
                LEFT JOIN Colour ON Fieldhospitalbed.C_Hb = Colour.C_Id
                LEFT JOIN Supportpatient ON Fieldhospitalbed.ID_Hb = Supportpatient.ID_Hb
                GROUP BY Fieldhospitalbed.ID_Hb";
       $result = $conn->query($sql);
       while ($my_row = $result->fetch_assoc()) {
            $amount_hb = $my_row[Amount_Hb];
            $c_name = $my_row[C_Name];
           if($c_name==="เขียว")
           {
                   $bed[1]+=$amount_hb;
           }
           else if($c_name==="เหลือง")
           {
                   $bed[2]+=$amount_hb;
           }
           else if($c_name==="แดง")
           {
                   $bed[3]+=$amount_hb;
           }
       }
       $bed[0]=$bed[1]+$bed[2]+$bed[3];
       require("connection_close.php");
       return $bed;
    } 
}