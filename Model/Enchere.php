<?php

include_once("../Model/DAO.php");
include_once ("../Model/Fossile.php");
#[\AllowDynamicProperties]


class Enchere {
    private string $id;
    private float $prixDep = 100;
    private float $prixActuel;
    private bool $demandeExpertise;
    private string $duree;
    private bool $suivi;
    private string $datePublication;
    private string $dateFin;
    private string $loginVendeur;
    private Fossile $fossile;
    private array $encherisseurs;
    private array $vainqueur;

    // CONSTRUCTEUR ENCHERE
    public function __construct(float $prixDep, bool $demandeExpertise, string $duree, Fossile $fossile){
        $this->prixDep = $prixDep;
        $this->prixActuel = $prixDep; // --> Prix de départ car aucune enchère n'a été faite au moment de la création de l'enchère
        $this->demandeExpertise = $demandeExpertise;
        Enchere::setDuree($duree);
        $this->suivi = false; // --> false car besoin secondaire
        Enchere::setDatePublication();
        Enchere::setLoginVendeur();
        $this->fossile = $fossile;
        $this->encherisseurs = array(); // --> tableau vide pour le moment car aucune enchère n'a été faite
        $this->vainqueur = array(); // --> tableau vide pour le moment car aucune enchère n'a été faite
        $this->idVendeur = $_SESSION['login'] ?? "";
        Enchere::setId();
        Enchere::setDateFin($duree);
        
    }



    // DEBUT GETTERS
    public function getId() : string{
        return $this->id;
    }
    
    public function getPrixDep() : float{
        return $this->prixDep;
    }

    public function getPrixActuel() : float{
        return $this->prixActuel;
    }
    
    public function getDemandeExpertise() : bool{
        return $this->demandeExpertise;
    }

    public function getDuree() : string{
        return $this->duree;
    }

    public function getDureeCalcul(string $duree) : string{
        $duree = "+ " . $duree . " days";
        return $duree;
    }

    public function getSuivi() : bool{
        return $this->suivi;
    }

    public function getDatePublication() : string{
        return $this->datePublication;
    }

    public function getDateFin() : string{

        return $this->dateFin;
    }

    public function getLoginVendeur() : string{
        return $this->vendeur;
    }

    public function getFossile() : Fossile{
        return $this->fossile;
    }

    public function getEncherisseurs() : array{
        return $this->encherisseurs;
    }

    public function getVainqueur() : array{
        return $this->vainqueur;
    }

    public static function getFossileFromId(int $idFossile) : Fossile{

        $query = "SELECT * FROM fossile WHERE id = :idFossile";
        $queryImg = 'SELECT * from fossile_image WHERE id = :idFossile';
        $data = ['idFossile' => $idFossile];
        $dao = DAO::get();
        $stmt = $dao->query($query, $data);
        $stmtImg = $dao->query($queryImg, $data);

        if($stmt === false){
            throw new Exception("Erreur lors de la récupération du fossile");
        }
        if($stmtImg === false){
            throw new Exception("Erreur lors de la récupération des images du fossile");
        }
        $arrayImage = array();
        foreach ($stmtImg as $array) {
            array_push($arrayImage, $array['image']);

        }
        $fossile = new Fossile ($stmt[0]['nom'], $arrayImage, $stmt[0]['etat'], $stmt[0]['longueur'],
                                $stmt[0]['largeur'], $stmt[0]['hauteur'], $stmt[0]['description']);
        return $fossile;
    }

    public static function getEnchereFromId(string $idEnchere) : Enchere{
        $query = "SELECT * FROM enchere WHERE id = :idEnchere";
        $data = ['idEnchere' => $idEnchere];
        $dao = DAO::get();
        $stmt = $dao->query($query, $data);
        if($stmt === false){
            throw new Exception("Erreur lors de la récupération de l'enchère");
        }
        $fossile = Enchere::getFossileFromId($stmt[0]['fossile']);
        $enchere = new Enchere($stmt[0]['prixdep'], $stmt[0]['souhaitexpertise'], $stmt[0]['duree'], $fossile);
        return $enchere;
    }

    public static function getFossileIdFromEnchereId(string $id) : string{
        return explode("-", $id);
    }
    // FIN GETTERS

    // DEBUT SETTERS
    public function setId(){ 
        $idVendeur = $this->idVendeur;
        $idFossile = strval($this->fossile->getId());
        $this->id = $idVendeur.'-'.$idFossile;

    }

    public function setPrixDep(float $prixDep){
        $this->prixDep = $prixDep;
    }

    public function setPrixActuel(float $prixActuel){
        $this->prixActuel = $prixActuel;
    }

    public function setDemandeExpertise(bool $demandeExpertise){
        $this->demandeExpertise = $demandeExpertise;
    }

    public function setDuree(string $duree){
        $duree = "+" . $duree ;
        $this->duree = $duree;
    }

    public function setSuivi(bool $suivi){
        $this->suivi = $suivi;
    }

    public function setDatePublication(){
        $datePublication = date('d-m-Y H:i:s');
        $this->datePublication = $datePublication;
    }

    public function setDateFin(){
        $duree = Enchere::getDuree();
        $dateDebut2 = $this->datePublication;
        $dureeTmp = $dateDebut2 . $duree;
        $dateFin2 = date("d-m-Y H:i:s", strtotime($dureeTmp));
        $this->dateFin = $dateFin2;
    }



    public function setLoginVendeur(){
        $loginVendeur = $_SESSION['login'] ?? "";
        $this->loginVendeur = $loginVendeur;
    }

    public function setFossile(Fossile $fossile){
        $this->fossile = $fossile;
    }

    public function setEncherisseurs(array $encherisseurs){
        $this->encherisseurs = $encherisseurs;
    }

    public function setVainqueur(array $vainqueur){
        $this->vainqueur = $vainqueur;
    }
    // FIN SETTERS

    // DEBUT ADD
    public function addEncherisseurs(Particulier $encherisseur){
        $this->encherisseurs[] = $encherisseur;
    }

    public function addVainqueur(Particulier $vainqueur){
        $this->vainqueur[] = $vainqueur;
    }
    // FIN ADD

    // FONCTION CREATE --- Enchere
    /**
     * @return void --> Insert de l'enchère dans la base de données
     * @throws Exception --> si l'enchère ne s'est pas correctement créée
     */
    public function create(){

        //ENCHERE (id, vendeur, fossile , prixDep, prixActuel, souhaitExpertise, datePublication, duree, suivi)
        $id = $this->id;
        $vendeur = $this->loginVendeur;
        $fossile = $this->fossile->getId();
        $prixDep = $this->prixDep;
        $prixActuel = $this->prixActuel;
        $demandeExpertise = $this->demandeExpertise;
        if($demandeExpertise == true){
            $demandeExpertise = "t";
        }
        else{
            $demandeExpertise = "f";

        }
        $datePublication = $this->datePublication;
        $duree = $this->duree;
        $dateFin = $this->dateFin;
        $suivi = $this->suivi;
        if($suivi == true){
            $suivi = "t";
        }
        else{
            $suivi = "f";

        }

        $query = 'INSERT INTO Enchere VALUES (:id, :vendeur, :fossile, :prixDep, :prixActuel, :demandeExpertise,
            :datePublication, :duree, :dateFin, :suivi)';

        $data = ['id' => $id, 'vendeur' => $vendeur, 'fossile' => $fossile, 'prixDep' => $prixDep, 'prixActuel' => $prixActuel,
            'demandeExpertise' => $demandeExpertise, 'datePublication' => $datePublication, 'duree' => $duree, 'dateFin' => $dateFin,  'suivi' => $suivi];

        $dao = DAO::get();
        $stmt = $dao->exec($query, $data);
        if ($stmt === false){
            throw new Exception("Erreur lors de la création d'une enchère");
        }

    }

    // FONCTION READ
    /**
     * @param int $id --> id de l'enchère à lire
     * @return Enchere --> l'enchère lue
     * @throws Exception --> si l'enchère n'existe pas
     */
    public static function read(string $id) : Enchere{

        $query = "SELECT * FROM Enchere WHERE id like :id";
        $data = ['id' => $id];
        $dao = DAO::get();
        $stmt = $dao->query($query, $data);
        
        if ($stmt === false){
            throw new Exception("Erreur lors de la lecture d'une enchère");
        }
        $dateFin = $stmt[0]['datefin'];
        $id = $stmt[0]['fossile'];
        $enchere = new Enchere($stmt[0]['prixdep'], $stmt[0]['souhaitexpertise'], $stmt[0]['duree'], Enchere::getFossileFromId($stmt[0]['fossile']));
        
        
        return $enchere;
    }

   
    /**
     * @return array Enchere --> la liste des enchères retourné
     * Retourne une array d'articles réucpérés de la base de données selon un No de page
     */
    public static function readPage(int $page, int $size) : array {
        $dao = DAO::get();
        $offset = ($page-1)*$size;

        $query = "SELECT * FROM Enchere LIMIT :size OFFSET :offset";
        $data = ['offset' => $offset, 'size' => $size];

        $stmt = $dao->query($query, $data);
        if ($stmt === false) {
            throw new Exception("Erreur lors de la lecture d'une enchère");
        }

        $encheres = array();
        foreach ($stmt as $row) {
            array_push($encheres, $row['id']);
        }

        return $encheres;
    }

    public static function recupInfoEnchere(string $id) : array{
        $query = "SELECT * FROM Enchere WHERE id like :id";
        $data = ['id' => $id];
        $dao = DAO::get();
        $stmt = $dao->query($query, $data);

        
        if ($stmt === false){
            throw new Exception("Erreur lors de la lecture d'une enchère");
        }
        $info = array();
        
        
        $info['datefin'] = $stmt[0]['datefin'];
        return $info;
    }

    // FONCTION UPDATE PRIX ACTUEL + AJOUT ENCHERISSEUR
    /**
     * @param float $prixActuel --> prix actuel de l'enchère qui est mis à jour dans la BD
     * @param Particulier $encherisseur --> enchérisseur qui a fait l'offre se fait ajouter dans la BD
     * @throws Exception --> Erreur mise à jour d'une enchère 
     * --> On reset le temps à 1 heure si au moment de l'enchère le temps est inférieur à 1 heure
     */
    public function updateOffre(float $prixActuel, Particulier $encherisseur){

        $id = $this->id;
        $this->addEncherisseurs($encherisseur);
        $this->setPrixActuel($prixActuel);

        $query = "UPDATE Enchere SET prixActuel = :prixActuel WHERE id = :id";
        $data = ['prixActuel' => $prixActuel, 'id' => $id];

        $queryEnch = "INSERT INTO ENCHERISSEURS VALUES (:encherisseur, :id, :offre)";
        $dataEnch = ['encherisseur' => $encherisseur->getLogin(), 'id' => $id, 'offre' => $prixActuel]; 


        $dao = DAO::get();

        $stmt = $dao->exec($query, $data);
        $stmtEnch = $dao->exec($queryEnch, $dataEnch);

        if ($this->duree > 3600){

            $this->setDuree(3600);
            $queryDuree = "UPDATE Enchere SET duree = 3600 WHERE id = :id";
            $dataDuree = ['id' => $id];

            $stmtDuree = $dao->exec($queryDuree, $dataDuree);
        }  
        
        if ($stmt === false){
            throw new Exception("Erreur lors de la mise à jour d'une enchère");
        }

    }

}
?>