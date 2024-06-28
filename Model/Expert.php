<?php
//namespace Tests;


include ("Utilisateur.php");
include ("Enchere.php");
include ("DAO.php");

class Expert extends Utilisateur{
    private string $lieuTravail;
    private int $nbExpertises;
    private array $enchereExpertisees; // --> Arrays de type Enchere
    
    // CONSTRUCTEUR EXPERT
    public function __construct(string $login,string $mdp,string $nom,string $prenom,string $mel,
    string $lieuTravail,int $nbExpertises){
        parent::__construct($login, $mdp, $nom, $prenom, $mel);
        $this->lieuTravail = $lieuTravail;
        $this->nbExpertises = $nbExpertises;
        $this->enchereExpertisees = 0;
    }

    // DEBUT GETTERS
    public function getLieuTravail():string{
        return $this->lieuTravail;
    }
    public function getNbExpertises():int{
        return $this->nbExpertises;
    }
    public function getEnchereExpertisees():Enchere{
        return $this->enchereExpertisees;
    }
    // FIN GETTERS  

    // DEBUT SETTERS
    public function setLieuTravail(string $lieuTravail):void{
        $this->lieuTravail = $lieuTravail;
    }

    public function setNbExpertises(int $nbExpertises):void{
        $this->nbExpertises = $nbExpertises;
    }
    // FIN SETTERS

    // DEBUT ADDERS
    public function addEnchereExpertisees(Enchere $enchere):void{
        $this->enchereExpertisees[] = $enchere;
    }
    // FIN ADDERS

    // FONCTION CREATE --- EXPERT
    /**
     * @throws Exception --> Erreur lors de la création de l'expert
     * @return void --> Crée un expert dans la base de données
     */
    public function create(){
        $login = $this->login;
        $mdp = $this->mdp;
        $nom = $this->nom;
        $prenom = $this->prenom;
        $mel = $this->mel;
        $lieuTravail = $this->lieuTravail;
        $nbExpertises = $this->nbExpertises;
        
        $query = "INSERT INTO expert VALUES (:login, :mdp, :nom, :prenom, :mel, :lieuTravail, :nbExpertises)";
        $data = ['login' => $login, 'mdp' => $mdp, 'nom' => $nom, 'prenom' => $prenom,
            'mel' => $mel, 'lieuTravail' => $lieuTravail, 'nbExpertises' => $nbExpertises];
        $dao = DAO::get();
        $stmt = $dao->exec($query, $data);
        if ($stmt === false){
        throw new Exception("Erreur lors de la création de l'expert");
    }

    }

}
?>