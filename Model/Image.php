<?php
include "Fossile.php";

class ImageFossile {

    private string $nom;
    //private string $chemin;
    private Fossile $fossile;

    public function __construct(string $nom, Fossile $fossile){
        $this->nom = $nom;
        $this->fossile = $fossile;
    }

    // DEBUT GETTERS
    public function getNom() : string{
        return $this->nom;
    }

    public function getFossile() : Fossile{
        return $this->fossile;
    }
    // FIN GETTERS

    // DEBUT SETTERS
    public function setNom(string $nom) : void{
        $this->nom = $nom;
    }

    public function setFossile(Fossile $fossile) : void{
        $this->fossile = $fossile;
    }
    // FIN SETTERS

    // FONCTION CREATE --- IMAGE
    /**
     * @throws Exception --> Erreur lors de l'insertion de l'image
     * @return void --> Crée une image dans la base de données
     */
    public function create(){
     
        $nom = $this->nom;
        $fossile = $this->fossile;

        $query = "INSERT INTO Fossile_image (nom, idFossile) VALUES ('$nom', '$fossile')";
        $data = [':nom' => $nom, ':fossile' => $fossile];

        $dao = DAO::get();
        $stmt = $dao->exec($query, $data);
        if($stmt === false){
            throw new Exception("Erreur lors de l'insertion de l'image");
        }

    }

}















?>