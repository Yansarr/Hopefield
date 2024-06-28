<?php
// Inclusion du framework
include_once("../framework/view.class.php");
// Inclusion de la session
require_once("../Model/Session.php");
include_once('../Model/DAO.php');
// Construction de la vue
$view = new View();

$id = $_POST['id'] ?? '1';


//Info sur le fossile
$dao = DAO::get();
$query = 'SELECT * FROM fossile WHERE id = :id';
$data = array('id' => $id);
$statement = $dao->query($query, $data);

$query2 = 'SELECT * FROM fossile_image WHERE id = :id';
$data2 = array('id' => $id);
$statement2 = $dao->query($query2, $data2);

$titre = $statement[0]['nom'];
$etat = TypeEtat::strToEtat($statement[0]['etat']);
$description = $statement[0]['description'];
$hauteur = $statement[0]['hauteur'];
$largeur = $statement[0]['largeur'];
$longueur = $statement[0]['longueur'];
$image = array();

foreach($statement2 as $img){
    $image[] = $img['image'];
}

//Info sur l'enchere
$queryEnchere = 'SELECT * FROM enchere WHERE fossile = :id';
$statementEnchere = $dao->query($queryEnchere, $data);
$prixActuel = $statementEnchere[0]['prixactuel'];
$dateFin = $statementEnchere[0]['datefin'];
$souhaitExpertise = $statementEnchere[0]['souhaitexpertise'];

$vendeur = $statementEnchere[0]['vendeur'];

//On passe les valeurs a la vue
$view->assign("id", $id);
$view->assign("vendeur", $vendeur);
$view->assign("image", $image);
$view->assign("titre", $titre);
$view->assign("etat", $etat);
$view->assign("description", $description);
$view->assign("hauteur", $hauteur);
$view->assign("largeur", $largeur);
$view->assign("longueur", $longueur);
$view->assign("prixActuel", $prixActuel);
$view->assign("dateFin", $dateFin);
$view->assign("souhaitExpertise", $souhaitExpertise);

$view->display("Description.view.php");



?>