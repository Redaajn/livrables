<?php

class Appartement implements JsonSerializable {
	public function jsonSerialize()
    {
        return array(
			 'idappartement' => $this->_idappartement,
             'numero_appartement' => $this->_numero_appartement,
             'prix_location' => $this->_prix_location,
             'etat_appartement' => $this->_etat_appartement,
             
        );
    }
	private $_idappartement;
	private $_numero_appartement;
	private $_prix_location;
	private $_etat_appartement;
	public function __construct() {
	
	}
	// public function __construct($data) {
	// 	$this->fill($data);
	// }
		public function getIdAppartement() { return $this->_idappartement; }
		public function getNumeroAppartement() { return $this->_numero_appartement; }
		public function getPrixLocation() { return $this->_prix_location; }
		public function getEtatAppartement() { return $this->_etat_appartement; }

		


		public function setIdAppartement($idappartement){
			$this->_idappartement = (int) $idappartement;
		}

		public function setNumeroAppartement($numero_appartement){	
					$this->_numero_appartement = $numero_appartement;
			
		}
		public function setPrixLocation($prix_location){
					$this->_prix_location = $prix_location;
		}
		public function setEtatAppartement($etat_appartement){
			$this->_etat_appartement = $etat_appartement;
}

		
}
?>