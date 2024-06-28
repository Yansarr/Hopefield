<?php
// namespace Tests;

include_once ("Utilisateur.php");
include_once ("Enchere.php");
include_once("DAO.php");


class Particulier extends Utilisateur {
    private array $encheresGagnees; // --> Arrays de type Enchere
    private array $encheresEncheries; // --> Arrays de type Enchere
    private array $encheresVente; // --> Arrays de type Enchere

    // CONSTRUCTEUR PARTICULIER
    public function __construct (string $login,string $mdp,string $nom,string $prenom,string $mel){
        parent::__construct($login,$mdp,$nom,$prenom,$mel);
        $this->encheresGagnees = array();
        $this->encheresEncheries = array();
        $this->encheresVente = array();
    }
    

    // DEBUT GETTERS
    public function getEncheresGagnees() : array{
        return $this->encheresGagnees;
    }

    public function getLogin() : string{
        return $this->login;
    }

    public function getEncheresEncheries() : array{
        return $this->encheresEncheries;
    }

    public function getEncheresVente() : array{
        return $this->encheresVente;
    }

    //getParticulierFromId
    public static function getParticulierFromId(string $login) : Particulier{
        $query = "SELECT * FROM particulier WHERE login_p = :login";
        $data = ['login' => $login];
        $dao = DAO::get();
        $stmt = $dao->query($query, $data);
        if ($stmt === false){
            throw new Exception("Erreur lors de la récupération du particulier");
        }
        $particulier = new Particulier($stmt[0]['login_p'], $stmt[0]['mdp'], $stmt[0]['nom'], $stmt[0]['prenom'], $stmt[0]['mel']);
        return $particulier;
    }
    // FIN GETTERS

    // DEBUT ADDERS
    public function addEnchereGagnee(Enchere $enchere) : void{
        $this->encheresGagnees[] = $enchere;
    }

    public function addEnchereParticipe(Enchere $enchere) : void{
        $this->encheresEncheries[] = $enchere;
    }

    public function addEnchereVente(Enchere $enchere) : void{
        $this->encheresVente[] = $enchere;
    }

    // FONCTION CREATE --- PARTICULIER
    public function create(){
        $login = $this->login;
        $mdp = $this->mdp;
        $nom = $this->nom;
        $prenom = $this->prenom;
        $mel = $this->mel;

        $query = "INSERT INTO particulier VALUES (:login, :mdp, :nom, :prenom, :mel)";
        $data = ['login' => $login, 'mdp' => $mdp, 'nom' => $nom, 'prenom' => $prenom, 'mel' => $mel];
        $dao = DAO::get();
        $stmt = $dao->exec($query, $data);
        if ($stmt === false){
            throw new Exception("Erreur lors de la création du particulier");
        }
    }
    
    // FIN ADD ENCHERE

    /**
     * Le particulier enchérie l'$enchere par le prix $offre
     * @enchere : l'enchère enchérie par le particulier
     * @offre : prix proposé par le particulier
     * Pré-condition : le prix actuel de l'enchère est inférieur à $offre
     */
    public function encherir(string $idEnchere, float $offre) : void {

        $dao = DAO::get();

        // Récupération de l'enchère
        $enchere = Enchere::getEnchereFromId($idEnchere);
        if($enchere->getPrixActuel() < $offre){
            $enchere->updateOffre($offre, $this);
        }else{
            throw new Exception("Le prix actuel de l'enchère est supérieur à votre offre");
        }

        if (!(in_array($enchere, $encheresEncheries))){
            $this->addEnchereParticipe($enchere);
        }
            
    }






}



?>
