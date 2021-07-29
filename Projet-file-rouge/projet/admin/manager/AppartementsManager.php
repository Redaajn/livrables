<?php
require_once('../model/Appartement.php');

class AppartementsManager {

	public function getList(){
		$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
		$stack = array();
		$req = "SELECT * FROM appartements";
		$result = $dbh->query($req)->fetchAll();
		foreach ($result as $row){
			$item = new Appartement();
			$item->setIdAppartement($row["idappartement"]);
			$item->setNumeroAppartement($row["numero_appartement"]);
			$item->setPrixAppartement($row["prix_location"]);
			$item->setEtatAppartement($row["etat_appartement"]);

			array_push($stack, $item);
		}
		return $stack;

	}
//Add Appartement
		public function add($appartement){
			$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
			$req = "INSERT INTO `appartements`(`idappartement`,`numero_appartement`, `prix_location`, `etat_appartement`) VALUES (:idappartement,:numero_appartement,:prix_location ,:etat_appartement)";

			$addAppartementQuery = $dbh ->prepare($req);
			$addAppartementQuery -> bindParam(":idappartement",$appartement->getIdAppartement(),PDO::PARAM_STR);	
			$addAppartementQuery -> bindParam(":numero_appartement",$appartement->getNumeroAppartement(),PDO::PARAM_STR);
            $addAppartementQuery -> bindParam(":prix_location",$appartement->getPrixLocation(),PDO::PARAM_STR);
			$addAppartementQuery -> bindParam(":etat_appartement",$appartement->getEtatAppartement(),PDO::PARAM_STR);

			$addAppartementQuery->execute();
        }
		// delete Appartement

		public function delete($id){
			$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");

			$req = "DELETE FROM appartements WHERE idappartement = $id";
			$deleteAppartement = $dbh->prepare($req);
            $deleteAppartement->execute();
        }
		// update product		
		public function update($product){
			$id = $product->getId();
			$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
			$req = "UPDATE appartements SET numero_appartement = :numero_appartement, prix_location = :prix_location,etat_appartement = :etat_appartement = :prix_location WHERE idappartement = $id";
			$updateAppartementQuery = $dbh ->prepare($req);
			$updateAppartementQuery -> bindParam(":numero_appartement",$appartement->getNumeroAppartement(),PDO::PARAM_STR);
            $updateAppartementQuery -> bindParam(":prix_location",$appartement->getPrixLocation(),PDO::PARAM_STR);
			$updateAppartementQuery -> bindParam(":prix_location",$appartement->getEtatAppartement(),PDO::PARAM_STR);
			$updateAppartementQuery->execute();
        }
}
?>