<?php
require_once '../manager/AppartementsManager.php';

$appartement = new Appartement();
$appartement->setNumeroAppartement($_POST["numero_appartement"]);
$appartement->setPrixLocation($_POST["prix_location"]);
$appartement->setEtatAppartement($_POST["etat_appartement"]);

$addAppartementManager = null;
$addAppartementManager =  new AppartementsManager(); 
$addAppartementQuery = $addAppartementManager->add($appartement);

?>