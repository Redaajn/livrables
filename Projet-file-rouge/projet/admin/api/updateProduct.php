<?php
require_once '../manager/productsManager.php';

$product = new Product;
$product->getId($_POST["idlocataires"]);
$product->getNom($_POST["nom_locataire"]);
$product->getNumero($_POST["numero_locataire"]);

$updateProductsManager = null;
$updateProductManager =  new productsManager(); 
$updateProductQuery = $updateProductManager->update($product);
?>