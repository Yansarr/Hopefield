<?php
// Inclusion du framework
include_once("../framework/view.class.php");
require_once("../Model/Session.php");


foreach ($_FILES as $field=>$files) {
    #Check if multiple files were uploaded to a field and process the values accordingly
    if (is_array($files['name'])) {
        foreach ($files['name'] as $key=>$file) {
            $_FILES[$field][$key]['name'] = $file;
            $_FILES[$field][$key]['type'] = $files['type'][$key];
            $_FILES[$field][$key]['size'] = $files['size'][$key];
            $_FILES[$field][$key]['tmp_name'] = $files['tmp_name'][$key];
            $_FILES[$field][$key]['error'] = $files['error'][$key];
            $_FILES[$field][$key]['full_path'] = $files['full_path'][$key];
        }
    } else {
        $_FILES[$field][0]['name'] = $files['name'];
        $_FILES[$field][0]['type'] = $files['type'];
        $_FILES[$field][0]['size'] = $files['size'];
        $_FILES[$field][0]['tmp_name'] = $files['tmp_name'];
        $_FILES[$field][0]['error'] = $files['error'];
        $_FILES[$field][0]['full_path'] = $files['full_path'];

    }
    unset($_FILES[$field]['name'], $_FILES[$field]['type'], $_FILES[$field]['size'], $_FILES[$field]['tmp_name'], $_FILES[$field]['error'], $_FILES[$field]['full_path']);
}


foreach ($_FILES as $field=>$files) {
    foreach ($files as $key=>$file) {
        if ($file['error'] == 0) {
            $tmp_name = $file['tmp_name'];
            $name = $file['name'];
            $name = str_replace(" ", "_", $name);
            move_uploaded_file($tmp_name, "../data/img/$name");
        }
    }
}

$image = $_FILES;

$nomIMG = array();

for ($i = 0; $i < count($image['file']); $i++) {
    $nomIMG[$i] = $image['file'][$i]['name'];
    $nomIMG[$i] = str_replace(" ", "_", $nomIMG[$i]);
    
    //Insertion dans la BDD de l'image
}

// Recuperation des donnees

$nom = $_POST['Nom'];
$etat = $_POST['etat'] ?? "";
$description = $_POST['description'] ?? "";

$hauteur = $_POST['Hauteur'];
$largeur = $_POST['Largeur'];
$longueur = $_POST['Longueur'];
$prix = $_POST['prix'];
$expertisation = $_POST['expertisation'] ?? "";
$duree = $_POST['duree'] ?? "";
$vente = $_POST['vente'] ?? "";

$erreur = "";

//transformation des virgules en points pour le décimal
$hauteur = str_replace(',','.',$hauteur);
$largeur = str_replace(',','.',$largeur);
$longueur = str_replace(',','.',$longueur);
//supression cm
$hauteur = str_replace("cm","",$hauteur);
$largeur = str_replace("cm","",$largeur);
$longueur = str_replace("cm","",$longueur);
//tranformation des espaces en _
$nom = str_replace(" ", "_", $nom);
$description =  str_replace(" ", "_", $description);




//transformation des virgules en points pour le décimal
$prix = str_replace(',','.',$prix);
// supression €/euros
$prix = str_replace("€","",$prix);
$prix = str_replace("euro","",$prix);
$prix = str_replace("euros","",$prix);


// Construction de la vue
$view = new View();

if (empty($nom) || empty($etat) || empty($hauteur) || empty($largeur) || empty($longueur) || empty($prix) || empty($duree)) {
    $erreur = "Tous les champs ayant une * doivent être remplis !";
    $view->assign("erreur", $erreur);
    $view->display("Vendre.view.php");
}else if( !(is_numeric($hauteur)) || !(is_numeric($largeur)) || !(is_numeric($longueur)) ){
    $erreur = "Erreur dimensions : les champs hauteurs, largeur et longueur doivent être des nombres";
    $view->assign("erreur",$erreur);
    $view->display("Vendre.view.php");
}else if( !(is_numeric($prix)) ){
    $erreur = "Erreur prix : le champ prix doit être un nombre";
    $view->assign("erreur",$erreur);
    $view->display("Vendre.view.php");
}else{
    $view->assign("image", $nomIMG);
    $view->assign("nom", $nom);
    $view->assign("etat", $etat);
    $view->assign("description", $description);
    $view->assign("hauteur", $hauteur);
    $view->assign("largeur", $largeur);
    $view->assign("longueur", $longueur);
    $view->assign("prix", $prix);
    $view->assign("expertisation", $expertisation);
    $view->assign("duree", $duree);
    $view->assign("vente", $vente);

    $view->display("recapitulatif-vente.view.php");
}

?>