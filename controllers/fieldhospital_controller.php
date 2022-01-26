<?php
class FieldHospitalController
{
    public function index()
    {
        $fieldhospitalList = Fieldhospital::getAll();
        require_once("./views/fieldhospital/index_fieldhospital.php");
    }
    public function search()
    {
        $key=$_GET['key'];
        $fieldhospitalList = Fieldhospital::search($key);
        require_once("./views/fieldhospital/index_fieldhospital.php");
    }
    public function newFieldhospital()
    {
        $agencyList = Agency::getAll();
        require_once("./views/fieldhospital/newFieldhospital.php");
    }
    public function addFieldhospital()
    {

        $id_fh=$_GET['ID_Fh'];
        $name_fh=$_GET['Name_Fh'];
        $address_fh=$_GET['Address_Fh'];
        $a_name=$_GET['A_name'];
        $date_fh=$_GET['Date_Fh'];
        $s = Fieldhospital::check($id_fh,$name_fh);
        if($s===a)
        {
            Fieldhospital::Add($id_fh,$name_fh,$address_fh,$a_name,$date_fh);
            FieldHospitalController::index();
        }
        else
        {
            require_once("./views/fieldhospital/errorCheck.php");
        }
        //Fieldhospital::Add($id_fh,$name_fh,$address_fh,$a_name,$date_fh);
        //FieldHospitalController::index();
    }
    public function updateForm()
    {
        $id=$_GET['ID_Fh'];
        $fieldhospitalList = Fieldhospital::get($id);
        $agencyList = Agency::getAll();
        require_once("./views/fieldhospital/updateForm.php");
    }
    public function update()
    {
        $id_fh=$_GET['ID_Fh'];
        $name_fh=$_GET['Name_Fh'];
        $address_fh=$_GET['Address_Fh'];
        $a_id=$_GET['A_ID'];
        $date_fh=$_GET['Date_Fh'];

        $oldid=$_GET['oldid'];
        Fieldhospital::update($id_fh,$name_fh,$address_fh,$a_id,$date_fh,$oldid);

        FieldHospitalController::index();
    }
    public function deleteConfirm()
    {
        $id=$_GET['ID_Fh'];
        $fieldhospitalList = Fieldhospital::get($id);
        require_once("./views/fieldhospital/deleteConfirm.php");
    }
    public function delete()
    {
        $id=$_GET['ID_Fh'];
        Fieldhospital::delete($id);
        FieldHospitalController::index();
    }
}
?>