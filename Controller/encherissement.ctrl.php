<?php
include_once("../framework/view.class.php");
require_once("../Model/Session.php");
include_once("../Model/Fossile.php");
include_once("../Model/Particulier.php");

$view = new View();
$loginVendeur = $_SESSION['login'];
$idEnchere = $_POST['id'] ?? '1';
$prix = $_POST['prix'] ?? '0';

$dao = DAO::get();

$queryEnchere = 'SELECT * FROM enchere WHERE fossile = :id';
$data = array('id' => $idEnchere);  
$statementEnchere = $dao->query($queryEnchere, $data);

$erreur = "";


$statementEnchere[0]['prixactuel'] = $prix;
$prixActuel = $statementEnchere[0]['prixactuel'];


$queryUpdate = 'UPDATE enchere SET prixactuel = :prixactuel WHERE fossile = :id';
$dataUpdate = array('prixactuel' => $statementEnchere[0]['prixactuel'], 'id' => $idEnchere);
$statementUpdate = $dao->exec($queryUpdate, $dataUpdate);


//display sisi rpz
$view->display("accueil.view.php");



?>