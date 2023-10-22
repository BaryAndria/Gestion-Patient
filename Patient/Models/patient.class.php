<?php
class Patient{
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $ville;
    private $tel;
    private $image;
    private $cin;


    public function __construct($id,$nom,$prenom,$adresse,$ville,$tel,$image,$cin){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->tel = $tel;
        $this->image = $image;
        $this->cin = $cin;
        
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getNom(){return $this->nom;}
    public function setNom($nom){$this->nom = $nom;}

    public function getPrenom(){return $this->prenom;}
    public function setPrenom($prenom){$this->prenom = $prenom;}

    public function getAdresse(){return $this->adresse;}
    public function setAdresse($adresse){$this->adresse = $adresse;}

    public function getVille(){return $this->ville;}
    public function setVille($ville){$this->ville = $ville;}

    public function getTelephone(){return $this->tel;}
    public function setTelephone($tel){$this->tel = $tel;}

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}

    public function getCin(){return $this->cin;}
    public function setCin($cin){$this->cin = $cin;}
}