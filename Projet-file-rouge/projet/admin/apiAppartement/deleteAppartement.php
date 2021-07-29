<?php
require_once '../manager/AppartemensManager.php';


$deleteAppartemensManager = null;
$deleteAppartemensManager =  new AppartemensManager(); 
$deleteAppartementsQuery = $deleteAppartemensManager->delete($_POST["idAppartement"]);
?>