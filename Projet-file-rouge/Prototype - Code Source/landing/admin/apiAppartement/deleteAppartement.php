<?php
require_once '../manager/AppartementsManager.php';


$deleteAppartementsManager = null;
$deleteAppartementsManager =  new AppartementsManager(); 
$deleteAppartementsQuery = $deleteAppartementsManager->delete($_POST["numero_appartement"]);
?>