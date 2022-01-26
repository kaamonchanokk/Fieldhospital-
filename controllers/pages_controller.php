<?php
class PagesController
{
    public function home()
    {
        $testlist = Fieldhospitalbed::sumbed();
        require_once("./views/pages/Home.php");
    }
    public function error()
    {
        require_once("./views/pages/Error.php");
    }
    public function profile()
    {
        require_once("./views/pages/Profile.php");
    }
}
?>