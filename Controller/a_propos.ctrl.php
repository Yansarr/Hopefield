<?php
// Inclusion du framework
include_once("../framework/view.class.php");
// Inclusion de la session
require_once("../Model/Session.php");
// Construction de la vue
$view = new View();
$view->display("A_propos.view.php");

?>