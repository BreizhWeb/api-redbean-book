<?php
class Genre {
    // Properties
    private $idGenre;
    private $nomGenre;
    
    // Constructeur
    function __construct($idGenre, $nomGenre) {
    	$this->idGenre = $idGenre;
    	$this->nomGenre = $nomGenre;
    
    }

    // Getters et Setters
    public function getIdGenre() {
    	return $this->idGenre;
    }

    /**
    * @param $idGenre
    */
    public function setIdGenre($idGenre) {
    	$this->idGenre = $idGenre;
    }

    public function getNomGenre() {
    	return $this->nomGenre;
    }

    /**
    * @param $nomGenre
    */
    public function setNomGenre($nomGenre) {
    	$this->nomGenre = $nomGenre;
    }
}
?>