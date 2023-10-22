
<?php
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/patient.controller.php";

$patientsController = new PatientController;

try
{
    if(empty($_GET['page']))
    {
        require "Views/acceuil.view.php";
    } 
    
    else 
    {
        $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);

        switch($url[0]){
            case "acceuil" : require "Views/acceuil.view.php";
            break;
            case "admin" : 
                if(empty($url[1]))
                {
                    $patientsController->afficherPatients();
                } 
                else if($url[1] === "l") {
                    $patientsController->afficherPatient($url[2]);
                }
                else if($url[1] === "a") {
                    $patientsController->ajoutPatient();
                }
                else if($url[1] === "av") {
                    $patientsController->ajoutPatientValidation();
                }
                else if($url[1] === "s") {
                    $patientsController->suppressionPatient($url[2]);
                }
                else if($url[1] === "m") {
                    $patientsController->modificationPatient($url[2]);
                }
                else if($url[1] === "mv") {
                    $patientsController->modificationPatientValidation();
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            break;
            default : throw new Exception("La page n'existe pas");
        }
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}

