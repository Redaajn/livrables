<?php
require_once '../manager/LocatairesManager.php';


$deleteLocatairesManager = null;
$deleteLocataireManager =  new LocatairesManager(); 
$deleteLocataireQuery = $deleteLocataireManager->delete($_POST["idlocataires"]);
?>