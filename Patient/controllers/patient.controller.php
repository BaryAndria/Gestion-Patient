<?php
require_once "Models/patientManager.model.php";

class PatientController
{
    private $PatientManager;

    public function __construct(){
        $this->PatientManager = new PatientManager;
        $this->PatientManager->chargementPatients();
    }

    public function afficherPatients(){
        $Patients = $this->PatientManager->getPatients();
        require "Views/patient.view.php";
    }

    public function afficherPatient($id){
        $patient = $this->PatientManager->getPatientById($id);
        require "Views/afficherProduit.view.php";
    }

    public function ajoutPatient(){
        require "Views/ajouter.view.php";
    }

    public function ajoutPatientValidation(){
        $file = $_FILES['image'];
        $repertoire = "public/img/";
        $nomImageAjoute = $this->ajoutImage($file,$repertoire);
        $this->PatientManager->addPatientBd($_POST['Nom'], $_POST['Prenom'] , $_POST['Adresse'],$_POST['Ville'],$_POST['Telephone'] ,$nomImageAjoute, $_POST['cin']);
        header('Location: '. URL . "admin");
    }

    public function suppressionPatient($id){
        $nomImage = $this->PatientManager->getPatientById($id)->getImage();
        unlink("public/img/".$nomImage);
        $this->PatientManager->deletePatientBD($id);
        header('Location: '. URL . "admin");
    }

    public function modificationPatient($id){
        $patient = $this->PatientManager->getPatientById($id);
        require "Views/modifierProduit.view.php";
    }

    public function modificationPatientValidation(){
        $imageActuelle = $this->PatientManager->getPatientById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];
        if($file['size'] > 0){
            unlink("public/img/".$imageActuelle);
            $repertoire = "public/img/";
            $nomImageToAdd = $this->ajoutImage($file,$repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        $this->PatientManager->updatePatientBD($_POST['identifiant'],$_POST['Nom'], $_POST['Prenom'] , $_POST['Adresse'],$_POST['Ville'],$_POST['Telephone'] ,$nomImageToAdd, $_POST['cin']);
        header('Location: '. URL . "admin");
    }

    private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        if(isset($_POST['valider']))   
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
}

