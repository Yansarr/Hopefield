<?php
// Inclusion du framework
include_once("../framework/view.class.php");
// Inclusion de la session
require_once("../Model/Session.php");
// Construction de la vue
$view = new View();

$erreur = "";

$view->assign("erreur", $erreur);
$view->display("Inscrire.view.php");

?>