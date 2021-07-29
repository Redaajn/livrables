<?php
require_once('../model/product.php');

class productsManager {

	public function getList(){
		$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
		$stack = array();
		$req = "SELECT * FROM locataires";
		$result = $dbh->query($req)->fetchAll();
		foreach ($result as $row){
			$item = new Product();
			$item->setId($row["idlocataires"]);
			$item->setNom($row["nom_locataire"]);
			$item->setNumero($row["numero_locataire"]);
			array_push($stack, $item);
		}
		return $stack;

	}
//Add Product
		public function add($product){
			$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
			$req = "INSERT INTO `locataires`(`idlocataires`,`nom_locataire`, `numero_locataire`) VALUES (:idlocataires,:nom_locataire,:numero_locataire)";

			$updateProductQuery = $dbh ->prepare($req);
			$updateProductQuery -> bindParam(":idlocataires",$product->getId(),PDO::PARAM_STR);	
			$updateProductQuery -> bindParam(":nom_locataire",$product->getNom(),PDO::PARAM_STR);
            $updateProductQuery -> bindParam(":numero_locataire",$product->getNumero(),PDO::PARAM_STR);
			$updateProductQuery->execute();
        }
		// delete product

		public function delete($id){
			$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");

			$req = "DELETE FROM locataires WHERE idlocataires = $id";
			$deleteProduct = $dbh->prepare($req);
            $deleteProduct->execute();
        }
		// update product		
		public function update($product){
			$id = $product->getId();
			$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
			$req = "UPDATE locataires SET nom_locataire = :nom_locataire, = :numero_locataire WHERE idlocataires = $id";
			$updateProductQuery = $dbh ->prepare($req);
			$updateProductQuery -> bindParam(":nom_locataire",$product->getNom(),PDO::PARAM_STR);
            $updateProductQuery -> bindParam(":numero_locataire",$product->getNumero(),PDO::PARAM_STR);
			$updateProductQuery->execute();
        }
}
?>