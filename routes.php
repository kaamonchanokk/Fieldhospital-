<?php
$controllers = array('pages'=>['home', 'error','profile'],
                    'fieldhospital'=>['index','search','newFieldhospital','addFieldhospital','updateForm','update','deleteConfirm','delete'],
					'fieldhospitalbed'=>['index','search','newFieldhospitalbed','addFieldhospitalbed','updateForm','update','deleteConfirm','delete'],
					'supportpatient'=>['index','search','newSupportpatient','addSupportpatient','updateForm','update','deleteConfirm','delete'],
					'telemedicine'=>['index','search','newTelemedicine','addTelemedicine','deleteConfirm','delete']); 

function call($controller, $action){
	//echo "routes to ".$controller."-".$action."<br>";
	require_once("./controllers/" .$controller."_controller.php"); 
	switch($controller)
	{
		case "pages":	$controller = new PagesController();
						require_once("models/fieldhospitalbedModel.php");
						break;
                        
        case "fieldhospital":  	$controller = new FieldHospitalController();
                                require_once("models/fieldhospitalModel.php");
								require_once("models/agencyModel.php");
                                break;
	case "fieldhospitalbed":  	
								$controller = new FieldHospitalBedController();
						   		require_once("models/fieldhospitalbedModel.php");
								require_once("models/fieldhospitalModel.php");
								require_once("models/ColourModel.php");
								break;

		case "supportpatient":  	$controller = new SupportPatientController();
									require_once("models/fieldhospitalbedModel.php");
									require_once("models/fieldhospitalModel.php");
									require_once("models/supportpatientModel.php");
									require_once("models/personModel.php");
									break;
		case "telemedicine":  		$controller = new TelemedicineController();
									require_once("models/telemedicineModel.php");
									require_once("models/personModel.php");
									require_once("models/staffModel.php");
									break;
	}
	$controller->{$action}();
}

if(array_key_exists($controller, $controllers)) 
{	if(in_array($action, $controllers [$controller]))
	{	call($controller, $action); }
	else
	{	call('pages', 'error'); }

}
else
{	call('pages', 'error');} 
?>