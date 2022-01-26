<?php
class TelemedicineController
{
    public function index()
    {
        $telemedicineList = Telemedicine::getAll();
        require_once("./views/telemedicine/index_telemedicine.php");
    }
    public function search()
    {
        $key=$_GET['key'];
        $telemedicineList = Telemedicine::search($key);
        require_once("./views/telemedicine/index_telemedicine.php");
    }
    public function newTelemedicine()
    {
        $personList = Person::getAll();
        $staffList = Staff::getAll();
        require_once("./views/telemedicine/newTelemedicine.php");
    }
    public function addTelemedicine()
    {

        $date_te=$_GET['Date_Te'];
        $p_te=$_GET['P_Te'];
        $m_te=$_GET['M_Te'];
        $tem_te=$_GET['Tem_Te'];
        $s_id=$_GET['S_Te'];
        $s = Telemedicine::check($date_te,$p_te);
        if($s===a)
        {
            Telemedicine::Add($date_te,$p_te,$m_te,$tem_te,$s_id);
            TelemedicineController::index();
        }
        else
        {
            require_once("./views/telemedicine/errorCheck.php");
        }
    }
    /* NOT USE !!
    public function updateForm()
    {
        $id=$_GET['ID_Te'];
        $telemedicineList = Telemedicine::get($id);
        $personList = Person::getAll();
        require_once("./views/telemedicine/updateForm.php");
    }
    public function update()
    {
        $id_te=$_GET['ID_Te'];
        $date_te=$_GET['Date_Te'];
        $p_te=$_GET['P_Te'];
        $c_te=$_GET['C_Te'];
        $m_te=$_GET['M_Te'];
        $tem_te=$_GET['Tem_Te'];
        $oldid=$_GET['oldid'];
        Telemedicine::update($id_te,$date_te,$p_te,$m_te,$tem_te,$oldid);

        TelemedicineController::index();
    }*/
    public function deleteConfirm()
    {
        $id=$_GET['ID_Te'];
        $telemedicineList = Telemedicine::get($id);
        require_once("./views/telemedicine/deleteConfirm.php");
    }
    public function delete()
    {
        $id=$_GET['ID_Te'];
        Telemedicine::delete($id);
        TelemedicineController::index();
    }
}
?>