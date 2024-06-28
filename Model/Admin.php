<?php
//namespace Tests;


include("Utilisateur.php");
class Admin extends Utilisateur{
    private array $encheresVerifiees;

    // CONSTRUCTEUR ADMIN
    public function __construct(string $login,string $mdp,string $nom,string $prenom,string $mel,array $encheresVerifiees){
        parent::__construct($login,$mdp,$nom,$prenom,$mel);
        $this->encheresVerifiees = $encheresVerifiees;
    }

    // DEBUT GETTERS
    public function getEncheresVerifiees() : array{
        return $this->encheresVerifiees;
    }
    // FIN GETTERS

    // DEBUT SETTERS
    public function setEncheresVerifiees(array $encheresVerifiees) : void{
        $this->encheresVerifiees = $encheresVerifiees;
    }
    // FIN SETTERS

    // FONCTION CREATE --- ADMIN
    /**
     * @throws Exception --> Erreur lors de la création de l'admin
     * @return void --> Crée un admin dans la base de données
     * 
     */
    public function create(){

        $login = $this->login;
        $mdp = $this->mdp;
        $nom = $this->nom;
        $prenom = $this->prenom;
        $mel = $this->mel;
        $encheresVerifiees = $this->encheresVerifiees;

        $query = "INSERT INTO admin VALUES (:login, :mdp, :nom, :prenom, :mel, :encheresVerifiees)";
        $data = ['login' => $login, 'mdp' => $mdp, 'nom' => $nom, 'prenom' => $prenom,
            'mel' => $mel, 'encheresVerifiees' => $encheresVerifiees];

        $dao = DAO::get();
        $stmt = $dao->exec($query, $data);
        if ($stmt === false){
            throw new Exception("Erreur lors de la création de l'admin");
        }

    }

}
$test = is_numeric("1,6");
$test2 = is_numeric("1.6");
?> 