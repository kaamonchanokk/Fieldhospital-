<?php
class FieldHospitalBedController
{
    public function index()
    {
        $testlist = Fieldhospitalbed::sumbed();
        $fieldhospitalbedList = Fieldhospitalbed::getAll();
        require_once("./views/fieldhospitalbed/index_fieldhospitalbed.php");
    }
    public function search()
    {
        $key=$_GET['key'];
        $fieldhospitalbedList = Fieldhospitalbed::search($key);
        require_once("./views/fieldhospitalbed/index_fieldhospitalbed.php");
    }
    public function deleteConfirm()
    {
        $id=$_GET['ID_Hb'];
        $fieldhospitalbedList = Fieldhospitalbed::get($id);
        require_once("./views/fieldhospitalbed/deleteConfirm.php");
    }
    public function delete()
    {
        $id=$_GET['ID_Hb'];
        Fieldhospitalbed::delete($id);
        FieldHospitalBedController::index();
    }
    public function newFieldhospitalbed()
    {
        $fieldhospitalList = Fieldhospital::getAll();
        $colourList = Colour::getAll();
        require_once("./views/fieldhospitalbed/newFieldhospitalbed.php");
    }
    public function addFieldhospitalbed()
    {
        $name_fh=$_GET['Name_Fh'];
        $max_hb=$_GET['Max_Hb'];
        $c_hb=$_GET['C_Hb'];
        $s = Fieldhospitalbed::check($name_fh,$c_hb);
        if($s===a)
        {
            Fieldhospitalbed::Add($name_fh,$max_hb,$c_hb);
            FieldHospitalBedController::index();
        }
        else
        {
            require_once("./views/fieldhospitalbed/errorCheck.php");
        }
        //Fieldhospitalbed::Add($id_hb,$name_fh,$max_hb,$c_hb);

        //FieldHospitalBedController::index();
    }
    public function updateForm()
    {
        $id=$_GET['ID_Hb'];
        $fieldhospitalbedList = Fieldhospitalbed::get($id);
        $fieldhospitalList = Fieldhospital::getAll();
        $colourList = Colour::getAll();
        require_once("./views/fieldhospitalbed/updateForm.php");
    }
    public function update()
    {
        $max_hb=$_GET['Max_Hb'];
        $oldid=$_GET['oldid'];

        Fieldhospitalbed::update($max_hb,$oldid);

        FieldHospitalBedController::index();
    }
}
?>