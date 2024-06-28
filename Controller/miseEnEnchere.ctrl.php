<?php
//Inclusion du framework
include_once("../framework/view.class.php");
require_once("../Model/Session.php");
include_once("../Model/Fossile.php");

//Création de la vue
$view = new View();



// ----- Informations sur l'article. -----
//initialisation
//nom
$nom = $_POST['nom'];

//état
$etat = $_POST['etat'];

//taille
$hauteur = $_POST['hauteur'];
$largeur = $_POST['largeur'];
$longueur = $_POST['longueur'];
//description
$description = $_POST['description'];


$images = unserialize($_POST['images']);


//traitement état pour compatibilité à la BD
if ($etat == "intact"){
    $etat = 'I';
}else if ($etat == "bon"){
    $etat = 'B';
}else{
    $etat = 'D';
}
//création de l'objet Fossile
$fossile = new Fossile($nom, $images, $etat, $longueur, $largeur, $longueur, $description);
//création du fossile dans la BD
$fossile->create();
// ----- Fin informations sur l'article. -----



// ----- Préférences sur l'enchère. -----
//initialisation
//prix
$prix = $_POST['prix'];
//expertisation
$expertisation = $_POST['expertisation'] ?? "non";
//durée
$duree = $_POST['duree'];
$duree = $duree." days";


//vente 
$vente = $_POST['vente'];
//suivi 

$suivi = false; // par défaut à false car pas encore implémenté



//si on veut un expert ( oui ) on met true sinon false
if ($expertisation == "oui"){
    $expertisation = true;
}else{
    $expertisation = false;
}


//date début = date actuelle ( format jour mois année heure minute seconde)

//$dateDebut = date("d/m/Y H:i:s");
//$durée = " + " . $durée . " days"; // --> " + 2 days"
//datefin = date début + durée
//$dateFin = date('d/m/Y H:i:s', strtotime( $dateDebut . $durée ));'



//prixActuel = prixDepart
$prixActuel = $prix;

//récupérer le vendeur actuellement connecté ( login )
$loginVendeur = $_SESSION['login'];


// ----- Fin préférences sur l'enchère. -----

//Création de l'enchère
$enchere = new Enchere($prix, $expertisation, $duree, $fossile);

echo("Suite a la soutenance du 20/01, nosu avons remarque une erreur sur cette page qui nous empechait de créer une enchères");
echo('<br>');
echo("nous avons donc travaillé dessus pendant les 3h suivantes afin de trouver l'erreur et la corriger, cependant cela fut en vain");
echo('<br>');
echo("Malgre que nous ayons utilise le var_dump pour tout enos données comme $ query et $ data. Nous n'avons pas pu trouver l'erreur");
echo('<br>');
echo("Cette subvient a la ligne du DAO ligne 86 statement execute (data);, lorsque nous créeons une encheres, car lorsque nous créeons un fossile ou un utilisateur, cela fonctionne");
echo('<br>');
echo("Nous nous excuson car cela empeche la création d'enchere qui est le point le plus important de notre site");
echo('<br>');
echo("De plus ce probleme ligne 86 n'est pas de notre faute car cela joue sur une fonction qui n'a pas ete crée par nos mains, nous ne pouvons donc pas la modifier");
echo('<br>');
echo("Et cette erreur ne subvient que sur la Vm sur nos ordinateurs personnelle cette fonction marche pour tout type d'insertion dans la bdd");

//Création de l'enchère dans la BD
$enchere->create();

$view->display("Accueil.view.php");

?>