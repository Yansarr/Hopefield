<?php
require_once("../Model/Session.php");
// Inclusion de la session
include("../framework/view.class.php");
if(isset($_SESSION['login'])){
    $view = new View();
    $view->display("compte.view.php");
}
else {
    $erreur = "Vous devez être connecté pour accéder à cette page";
    $view = new View();
    $view->assign("erreur", $erreur);
    $view->display("Inscrire.view.php");
}
?> 