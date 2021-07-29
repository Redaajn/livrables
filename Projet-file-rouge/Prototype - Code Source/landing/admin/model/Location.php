<?php

class Location implements JsonSerializable {
	public function jsonSerialize()
    {
        return array(
			 'idlocations' => $this->_idlocations,
			 'nom_locataire' => $this->_nom_locataire,             
             'numero_appartement' => $this->_numero_appartement,
			 'mois_paiement' => $this->_mois_paiement,

        );
    }
	private $_idlocations;
	private $_nom_locataire;
	private $_numero_appartement;
	private $_mois_paiement;


	public function __construct() {
	
	}
	// public function __construct($data) {
	// 	$this->fill($data);
	// }
		public function getIdLocation() { return $this->_idlocations; }
		public function getNumero() { return $this->_numero_appartement; }
		public function getNomLocataire() { return $this->_nom_locataire; }
		public function getMoisPaiement() { return $this->_mois_paiement; }


		


		public function setIdLocation($idlocations){
			$this->_idlocations = (int) $idlocations;
		}

		public function setNumero($numero_appartement){	
					$this->_numero_appartement = $numero_appartement;
			
		}
		public function setNomLocataire($nom_locataire){
					$this->_nom_locataire = $nom_locataire;
		}
		
		public function setMoisPaiement($mois_paiement){
			$this->_mois_paiement = $mois_paiement;
}
}
?>