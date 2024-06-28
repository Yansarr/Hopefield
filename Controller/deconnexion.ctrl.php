<?php
require_once("../Model/Session.php");
session_destroy();
header('Location: accueil.ctrl.php');
?>