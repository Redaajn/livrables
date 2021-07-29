<?php
require_once '../manager/productsManager.php';

$product = new Product();
$product->setNom($_POST["nom_locataire"]);
$product->setNumero($_POST["numero_locataire"]);

$addProductManager = null;
$addProductManager =  new productsManager(); 
$addProductQuery = $addProductManager->add($product);

?>