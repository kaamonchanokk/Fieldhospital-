<?php
class Telemedicine
{
    public $ID_Te,$Date_Te,$P_Te,$M_Te,$Tem_Te,$PS_name,$S_ID,$S_Name;

    public function __construct($id_te,$date_te,$p_te,$m_te,$tem_te,$ps_name,$s_id,$s_name)
    {
        $this->ID_Te= $id_te;
        $this->Date_Te= $date_te;
        $this->P_Te= $p_te;
        $this->M_Te= $m_te;
        $this->Tem_Te= $tem_te;
        $this->PS_name= $ps_name;
        $this->S_ID= $s_id;
        $this->S_Name= $s_name;
    }

    public static function getAll()
    {
        $telemedicineList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Telemedicine LEFT JOIN Person ON Person.PS_id = Telemedicine.P_Te LEFT JOIN Staff ON Telemedicine.S_Te = Staff.S_ID ORDER BY ID_Te";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {

            $id_te = $my_row[ID_Te];
            $date_te = $my_row[Date_Te];

            $p_te = $my_row[P_Te];

            $m_te = $my_row[M_Te];
            $tem_te = $my_row[Tem_Te];

            $ps_name = $my_row[PS_name];

            $s_id = $my_row[S_ID];
            $s_name = $my_row[S_Name];
           
            $telemedicineList[] = new Telemedicine($id_te,$date_te,$p_te,$m_te,$tem_te,$ps_name,$s_id,$s_name);
        }
        require("connection_close.php");
        return $telemedicineList;
    }

    public static function search($key)
    {
        $telemedicineList = [];
        require("connection_connect.php");
        $sql="SELECT * FROM Telemedicine LEFT JOIN Person ON Person.PS_id = Telemedicine.P_Te LEFT JOIN Staff ON Telemedicine.S_Te = Staff.S_ID WHERE (ID_Te like '%$key%' or PS_name like '%$key%' or S_Name like '%$key%' or Date_Te like '%$key%') ORDER BY ID_Te";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $id_te = $my_row[ID_Te];
            $date_te = $my_row[Date_Te];

            $p_te = $my_row[P_Te];

            $m_te = $my_row[M_Te];
            $tem_te = $my_row[Tem_Te];

            $ps_name = $my_row[PS_name];

            $s_id = $my_row[S_ID];
            $s_name = $my_row[S_Name];
            
            $telemedicineList[] = new Telemedicine($id_te,$date_te,$p_te,$m_te,$tem_te,$ps_name,$s_id,$s_name);
        }
        require("connection_close.php");
        return $telemedicineList;

    }
    public static function Add($date_te,$p_te,$m_te,$tem_te,$s_id)
    { 
       require("connection_connect.php");
       $sql = "INSERT INTO `Telemedicine` (`ID_Te`, `Date_Te`, `P_Te`, `M_Te`, `Tem_Te`, `S_Te`) VALUES (NULL, '$date_te', '$p_te', '$m_te', '$tem_te', '$s_id')";
       $result = $conn->query($sql);
       require("connection_close.php");
       return  ;
    }
    public static function get($id)
    {
        require("connection_connect.php");
        $sql="SELECT * FROM Telemedicine INNER JOIN Person ON Person.PS_id = Telemedicine.P_Te WHERE ID_Te='$id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();

        $id_te = $my_row[ID_Te];
        $date_te = $my_row[Date_Te];

        $p_te = $my_row[P_Te];

        $m_te = $my_row[M_Te];
        $tem_te = $my_row[Tem_Te];

        $ps_name = $my_row[PS_name];

        require("connection_close.php");
        return new Telemedicine($id_te,$date_te,$p_te,$m_te,$tem_te,$ps_name);

    }
    /* NOT USE !!
    public static function update($id_te,$date_te,$p_te,$m_te,$tem_te,$oldid)
    {
       require("connection_connect.php");
       $sql="UPDATE `Telemedicine` SET `ID_Te`='$id_te',`Date_Te`='$date_te',
       `P_Te`='$p_te',`M_Te`='$m_te',`Tem_Te`='$tem_te' WHERE ID_Te = '$oldid'";
       $result=$conn->query($sql);
       require("connection_close.php");
       return ;
    }*/
    public static function delete($id)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM Telemedicine WHERE ID_Te = '$id'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return ;
    }
    public static function check($getdate_te,$getp_te)
    {
       $s = a;
       require("connection_connect.php");
       $sql = "SELECT * FROM Telemedicine INNER JOIN Person ON Person.PS_id = Telemedicine.P_Te";
       $result = $conn->query($sql);
       while ($my_row = $result->fetch_assoc()) {
            $date_te = $my_row[Date_Te];
            $p_te = $my_row[P_Te];
            $ps_name = $my_row[PS_name];
           if($getdate_te===$date_te and $getp_te===$p_te)
           {
                   $s="คุณได้ทำการบันทึกอาการของคุณ".$ps_name."<br><br>ประจำวันที่".$date_te."ไปก่อนหน้านี้แล้ว";
                   break;
           }
       }
       require("connection_close.php");
       return $s;
    } 
}