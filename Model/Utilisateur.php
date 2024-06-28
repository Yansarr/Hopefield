<?php
//namespace Tests;

abstract class Utilisateur{
    protected string $login;
    protected string $mdp;
    protected string $nom;
    protected string $prenom;
    protected string $mel;

    //Constructeur de la classe Utilisateurs
    protected function __construct (string $login,string $mdp,string $nom,string $prenom,string $mel){
        $this->login = $login;
        $this->mdp = $mdp;//password_hash('sha512',$mdp);
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mel = $mel;
    }


    // DEBUT GETTER
    protected function getLogin() : string{
        return $this->login;
    }

    protected function getMdp() : string{
        return $this->mdp;
    }

    protected function getNom() : string{
        return $this->nom;
    }

    protected function getPrenom() : string{
        return $this->prenom;
    }

    protected function getMel() : string{
        return $this->mel;
    }
    // FIN GETTER

    // DEBUT SETTER
    protected function setLogin(string $login) : void{
        $this->login = $login;
    }

    public function setMdp(string $mdp) : void{
        $this->mdp = $mdp;//password_hash('sha512',$mdp);        
    }

    public function setNom(string $nom) : void{
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom) : void{
        $this->prenom = $prenom;
    }

    public function setMel(string $mel) : void{
        $this->mel = $mel;
    }
    // FIN SETTER

    

}

?>