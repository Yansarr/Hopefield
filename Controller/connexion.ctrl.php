<?php
// Inclusion du framework
include_once("../framework/view.class.php");
include("../Model/Particulier.php");
include_once("../Model/DAO.php");
// Inclusion de la session
require_once("../Model/Session.php");

//include_once("../Vue/Recapitulatif-vente.view.php");

// Récupération des données GET, POST, et SESSION pour la connexion

$login = $_POST['login'] ?? "";
$password = $_POST['password'] ?? "";


//création de la variable erreur
$erreur = "";




// Construction de la vue
$view = new View();



if($login == "" || $password == ""){
    $erreur = "Veuillez remplir tous les champs pour vous connecter";
    $view->assign("erreur", $erreur);
    $view->display("inscrire.view.php");
}
else {
    // Verification de l'existence du login dans la base de données
    $dao = DAO::get();
    $table = $dao->findParticulier($login);
    if(count($table) == 0){
        //Si il n'y a pas de login dans la base de données
        $erreur = "Le login n'existe pas ou est incorrect";
        $view->assign("erreur", $erreur);
        $view->display("Inscrire.view.php");
    }
    else {
        //Si le login est present dans la base on verifie le mot de passe
        $hashedpwd = $table[0][1];
        if (!password_verify($password, $hashedpwd)){
            $erreur = "Le mot de passe est incorrect";
            $view->assign("erreur", $erreur);
            $view->display("Inscrire.view.php");
        }
        else {
            //Si le mot de passe est correct on connecte l'utilisateur
            $_SESSION['login'] = $login;
            $view->display("Accueil.view.php");
        }
        
    }
    


}

?>