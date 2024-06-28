<?php
// Inclusion du framework
include_once("../framework/view.class.php");
require_once("../Model/Session.php");
// Construction de la vue
$view = new View();
$view->display("Inscrire-Expert.view.php");

//Ajout d'un expert dans la base de données
$login=$_POST['login'];
$mdp=$_POST['mdp'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mel=$_POST['mel'];




?>