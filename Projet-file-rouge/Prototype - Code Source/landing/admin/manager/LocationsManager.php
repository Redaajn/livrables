<?php
require_once('../model/Location.php');

class LocationsManager {

	public function getList(){
		$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
		$stack = array();
		$req =  "Select * from locataires lr left join locations l on l.idlocataires=lr.idlocataires left join appartements a on a.idappartements=l.idappartements ";
		$result = $dbh->query($req)->fetchAll();
		foreach ($result as $row){
			$item = new Location();
			$item->setIdLocation($row["idlocations"]);
			$item->getNomLocataire($row["nom_locataire"]);
			$item->setNumero($row["numero_appartement"]);
			$item->setMoisPaiement($row["mois_paiement"]);			
			array_push($stack, $item);
		}
		return $stack;
	}
		// update Locataire		
		public function update($product){
			$id = $product->getId();
			$dbh = new PDO("mysql:host=localhost;dbname=gestion_location","root","Tanger123");
			$req = "UPDATE locations SET nom_locataire = :nom_locataire, = :numero_locataire WHERE idlocations = $id";
			$updateProductQuery = $dbh ->prepare($req);
			$updateProductQuery -> bindParam(":nom_locataire",$product->getNom(),PDO::PARAM_STR);
            $updateProductQuery -> bindParam(":numero_locataire",$product->getNumero(),PDO::PARAM_STR);
			$updateProductQuery->execute();
        }
}
?>