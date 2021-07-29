<?php
require_once '../manager/AppartementsManager.php';

$appartement = new Appartement;
$appartement->getIdAppartement($_POST["idappartement"]);
$appartement->getNumeroAppartement($_POST["numero_appartement"]);
$appartement->getPrixLocation($_POST["prix_location"]);
$appartement->getEtatLocation($_POST["etat_appartement"]);

$updateAppartementsManager = null;
$updateAppartementManager =  new AppartementsManager(); 
$updateAppartementQuery = $updateAppartementManager->update($appartement);
?>