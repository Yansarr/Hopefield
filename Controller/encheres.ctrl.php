<?php
// Inclusion du framework
include_once("../framework/view.class.php");

include_once("../Model/Enchere.php");
include_once("../Model/Fossile.php");

// Inclusion de la session

require_once("../Model/Session.php");

// Partie Controller

$page = $_GET['page'] ?? 1;


if ($page==1){
    $pagePrec = 1;
}
else{
    $pagePrec = $page-1;
}

$pageSuiv = $page+1;

$encheres = Enchere::readPage($page, 8);

// Inclusion de la session
require_once("../Model/Session.php");

// Construction de la vue
$view = new View();

$view->assign('pagePrec', $pagePrec);
$view->assign('page', $page);
$view->assign('pageSuiv', $pageSuiv);
$view->assign('encheres', $encheres);
$view->display("Encheres.view.php");

?>