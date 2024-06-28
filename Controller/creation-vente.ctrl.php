<?php
// Inclusion du framework
include_once("../framework/view.class.php");
// Inclusion de la session

require_once("../Model/Session.php");

// Recuperation des donnees
$nom = $_GET['Nom'];
$etat = $_GET['etat'] ?? "";
$description = $_GET['description'] ?? "";
$hauteur = $_GET['Hauteur'];
$largeur = $_GET['Largeur'];
$longueur = $_GET['Longueur'];
$prix = $_GET['prix'];
$expertisation = $_GET['expertisation'] ?? "";
$duree = $_GET['duree'];
$vente = $_GET['vente'] ?? "";


// Construction de la vue
$view = new View();



?>