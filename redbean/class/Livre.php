<?php
class Livre {
    // Properties
    private $idLivre;
    private $titre;
    private $genre;
    private $idAuteur;

    // Construteur
    function __construct($idLivre, $titre, $genre, $idAuteur) {
    	$this->idLivre = $idLivre;
    	$this->titre = $titre;
    	$this->genre = $genre;
    	$this->idAuteur = $idAuteur;
    
    }

    // Getters et Setters
    public function getIdLivre() {
    	return $this->idLivre;
    }

    /**
    * @param $idLivre
    */
    public function setIdLivre($idLivre) {
    	$this->idLivre = $idLivre;
    }

    public function getTitre() {
    	return $this->titre;
    }

    /**
    * @param $titre
    */
    public function setTitre($titre) {
    	$this->titre = $titre;
    }

    public function getGenre() {
    	return $this->genre;
    }

    /**
    * @param $genre
    */
    public function setGenre($genre) {
    	$this->genre = $genre;
    }

    public function getIdAuteur() {
    	return $this->idAuteur;
    }

    /**
    * @param $idAuteur
    */
    public function setIdAuteur($idAuteur) {
    	$this->idAuteur = $idAuteur;
    }
}
