<?php
// Inclusion du framework
include_once("../framework/view.class.php");
// Inclusion de la session
require_once("../Model/Session.php");
// Construction de la vue

if(isset($_SESSION['login'])){
    $view = new View();
    $erreur = "";
    $view->assign("erreur", $erreur);
    $view->display("Vendre.view.php");
}
else{
    $erreur = "Vous devez être connecté pour accéder à cette page";
    $view = new View();
    $view->assign("erreur", $erreur);
    $view->display("Inscrire.view.php");
}


?>