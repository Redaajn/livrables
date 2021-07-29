<?php
require_once '../manager/LocatairesManager.php';

$locataire = new Locataire();
$locataire->setNom($_POST["nom_locataire"]);
$locataire->setNumero($_POST["numero_locataire"]);

$addLocataireManager = null;
$addLocataireManager =  new LocatairesManager(); 
$addLocataireQuery = $addLocataireManager->add($locataire);

?>