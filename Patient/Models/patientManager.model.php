<?php
require_once "database.php";
require_once "patient.class.php";

class PatientManager extends Model
{
    private $products; //tableau des patients

    public function addPatients($patient){
        $this->patients[] = $patient;
    }

    public function getPatients(){
        return $this->patients;
    }

    public function chargementPatients()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM patient");
        $req->execute();
        $patients = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($patients as $patient){
            $p = new Patient($patient['id'],$patient['nom'],$patient['prenom'],$patient['adresse'],$patient['ville'], $patient['telephone'],$patient['image'],$patient['numero_cin']);
            $this->addPatients($p);
        }
    }

    public function getPatientById($id){
        
        for($i=0; $i < count($this->patients);$i++){
            if($this->patients[$i]->getId() === $id){
                return $this->patients[$i];
            }
        }
    }

    public function addPatientBd($nom,$prenom,$adresse,$ville,$tel,$image,$cin){
        $req = "
                INSERT INTO patient (nom, prenom, adresse, ville, telephone, image, numero_cin)
                values (:nom, :prenom, :adresse, :ville, :telephone, :image, :numero_cin)";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $stmt->bindValue(":adresse",$adresse,PDO::PARAM_STR);
        $stmt->bindValue(":ville",$ville,PDO::PARAM_STR);
        $stmt->bindValue(":telephone",$tel,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":numero_cin",$cin,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $patient = new Patient($this->getBdd()->lastInsertId(),$nom,$prenom,$adresse,$ville,$tel,$image,$cin);
            $this->addPatients($patient);
        }        
    }

    public function deletePatientBD($id){
        $req = "
        Delete from patient where id = :idPatient
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idPatient",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $patient = $this->getPatientById($id);
            unset($patient);
        }
    }

    public function updatePatientBD($id,$nom,$prenom,$adresse,$ville,$tel,$image,$cin){
        $req = "
        update patient 
        set nom = :nom, prenom = :prenom, adresse = :adresse, ville = :ville, telephone = :telephone, image = :image, numero_cin =:numero_cin
        where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $stmt->bindValue(":adresse",$adresse,PDO::PARAM_STR);
        $stmt->bindValue(":ville",$ville,PDO::PARAM_STR);
        $stmt->bindValue(":telephone",$tel,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":numero_cin",$cin,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getPatientById($id)->setNom($nom);
            $this->getPatientById($id)->setPrenom($prenom);
            $this->getPatientById($id)->setAdresse($adresse);
            $this->getPatientById($id)->setVille($ville);
            $this->getPatientById($id)->setTelephone($tel);
            $this->getPatientById($id)->setImage($image);
            $this->getPatientById($id)->setCin($cin);
        }
    }

}
?>