<?php

include_once("../framework/view.class.php");
include ("../Model/Particulier.php");
// Inclusion de la session
require_once("../Model/Session.php");
// Récupération des données GET, POST, et SESSION pour l'inscription

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$login = $_POST['login'];
$motdePasse = $_POST['password'];
$motdePasse2 = $_POST['password2'];


$erreur = "";

$domaine = explode("@", $email);


if($domaine[0] != ''){

    function read($csv){
        $file = fopen($csv, 'r');
        while (!feof($file) ) {
            $line[] = fgetcsv($file, 1024);
        }
        fclose($file);
        return $line;
    }

    $csv = read("../data/free_email_provider_domains.csv");

    $adresseOK = false;

    $i = 0;

    while($i < count($csv) - 1){
        if($domaine[1] == $csv[$i][0]){
            $adresseOK = true;
        }
        $i++;
    }
}

$view = new View();

if($motdePasse == "" || $motdePasse2 == "" || $nom == "" || $prenom == "" || $email == "" || $login == ""){
    $erreur = "Veuillez remplir tous les champs lors de votre inscription";
    $view->assign("erreur", $erreur);
    $view->display("Inscrire.view.php");
}else if(strlen($motdePasse) < 8){
    $erreur = "Votre mot de passe doit contenir au moins 8 caractères";
    $view->assign("erreur", $erreur);
    $view->display("Inscrire.view.php");
}else if($motdePasse != $motdePasse2){
    $erreur = "Vos mots de passe pour vous créer un compte ne correspondent pas";
    $view->assign("erreur", $erreur);
    $view->display("Inscrire.view.php");
}else if($adresseOK == false){
    $erreur = "Votre adresse mail n'est pas valide";
    $view->assign("erreur", $erreur);
    $view->display("Inscrire.view.php");
}else{ 
    try{
        $hashedpwd= password_hash($motdePasse, PASSWORD_DEFAULT);
        //création d'un particulier
        $particulier = new Particulier($login, $hashedpwd, $nom, $prenom, $email);
        //Creation du particulier dans la base de données
        $particulier->create();
        $erreur = "Vous êtes bien inscrit, vous pouvez vous connecter";
        $view->assign("erreur", $erreur);
        $view->display("Inscrire.view.php");
    }catch (Exception $e){
        $erreur = "Votre login est déjà utilisé";
        $view->assign("erreur", $erreur);
        $view->display("Inscrire.view.php");
    }
}
//Je note la une idee pour recup les donnees pas bonnes:
//En gros on peut juste recp la query et remettre que les donnees correctes
?>