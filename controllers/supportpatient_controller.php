<?php
class SupportPatientController
{
    public function index()
    {
        $supportpatientList = Supportpatient::getAll();
        require_once("./views/supportpatient/index_supportpatient.php");
    }
    public function search()
    {
        $key=$_GET['key'];
        $supportpatientList = Supportpatient::search($key);
        require_once("./views/supportpatient/index_supportpatient.php");
    }
    public function newSupportpatient()
    {
        $fieldhospitalbedList = Fieldhospitalbed::getAll();
        $personList = Person::getAll();
        require_once("./views/supportpatient/newSupportpatient.php");
    }
    public function addSupportpatient()
    {

        $date_sup=$_GET['Date_Sup'];
        $time_sup=$_GET['Time_Sup'];
        $p_sup=$_GET['P_Sup'];
        $id_hb=$_GET['ID_Hb'];
        Supportpatient::Add($date_sup,$time_sup,$p_sup,$id_hb);

        SupportPatientController::index();
    }
    public function updateForm()
    {
        $id=$_GET['ID_Sup'];
        $supportpatientList = Supportpatient::get($id);
        $fieldhospitalbedList = Fieldhospitalbed::getAll();
        $personList = Person::getAll();
        require_once("./views/supportpatient/updateForm.php");
    }
    public function update()
    {
        $date_sup=$_GET['Date_Sup'];
        $time_sup=$_GET['Time_Sup'];
        $p_sup=$_GET['P_Sup'];
        $id_hb=$_GET['ID_Hb'];

        $oldid=$_GET['oldid'];

        Supportpatient::update($date_sup,$time_sup,$p_sup,$id_hb,$oldid);

        SupportPatientController::index();
    }
    public function deleteConfirm()
    {
        $id=$_GET['ID_Sup'];
        $supportpatientList = Supportpatient::get($id);
        require_once("./views/supportpatient/deleteConfirm.php");
    }
    public function delete()
    {
        $id=$_GET['ID_Sup'];
        Supportpatient::delete($id);
        SupportPatientController::index();
    }
}
?>