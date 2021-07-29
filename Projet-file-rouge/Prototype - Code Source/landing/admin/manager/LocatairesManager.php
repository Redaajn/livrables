<?php
require_once('../model/Locataire.php');

class LocatairesManager {

	public function getList(){
		$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
		$stack = array();
		$req = "SELECT * FROM locataires";
		$result = $dbh->query($req)->fetchAll();
		foreach ($result as $row){
			$item = new Locataire();
			$item->setId($row["idlocataires"]);
			$item->setNom($row["nom_locataire"]);
			$item->setNumero($row["numero_locataire"]);
			array_push($stack, $item);
		}
		return $stack;

	}
//Add Locataire
		public function add($locataire){
			$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
			$req = "INSERT INTO `locataires`(`idlocataires`,`nom_locataire`, `numero_locataire`) VALUES (:idlocataires,:nom_locataire,:numero_locataire)";

			$updateLocataireQuery = $dbh ->prepare($req);
			$updateLocataireQuery -> bindParam(":idlocataires",$locataire->getId(),PDO::PARAM_STR);	
			$updateLocataireQuery -> bindParam(":nom_locataire",$locataire->getNom(),PDO::PARAM_STR);
            $updateLocataireQuery -> bindParam(":numero_locataire",$locataire->getNumero(),PDO::PARAM_STR);
			$updateLocataireQuery->execute();
        }
		// delete Locataire

		public function delete($id){
			$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");

			$req = "DELETE FROM locataires WHERE idlocataires = $id";
			$deleteLocataire = $dbh->prepare($req);
            $deleteLocataire->execute();
        }
		// update Locataire		
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