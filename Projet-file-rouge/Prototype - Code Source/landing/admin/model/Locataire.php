<?php

class Locataire implements JsonSerializable {
	public function jsonSerialize()
    {
        return array(
			 'idlocataires' => $this->_idlocataires,
			 'nom_locataire' => $this->_nom_locataire,             
             'numero_locataire' => $this->_numero_locataire,
        );
    }
	private $_idlocataires;
	private $_nom_locataire;
	private $_numero_locataire;
	public function __construct() {
	
	}
	// public function __construct($data) {
	// 	$this->fill($data);
	// }
		public function getId() { return $this->_idlocataires; }
		public function getNumero() { return $this->_numero_locataire; }
		public function getNom() { return $this->_nom_locataire; }

		


		public function setId($idlocataires){
			$this->_idlocataires = (int) $idlocataires;
		}

		public function setNumero($numero_locataire){	
					$this->_numero_locataire = $numero_locataire;
			
		}
		public function setNom($nom_locataire){
					$this->_nom_locataire = $nom_locataire;
		}
		
}
?>