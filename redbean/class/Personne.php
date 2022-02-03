<?php
class Personne {
    // Properties
    private $idPersonne;
    private $nom;
    private $prenom;
    private $auteur;

    // Constructeur
    function __construct($idPersonne, $nom, $prenom, $auteur) {
    	$this->idPersonne = $idPersonne;
    	$this->nom = $nom;
    	$this->prenom = $prenom;
    	$this->auteur = $auteur;
    
    }

    // Getters et Setters
    public function getIdPersonne() {
    	return $this->idPersonne;
    }

    /**
    * @param $idPersonne
    */
    public function setIdPersonne($idPersonne) {
    	$this->idPersonne = $idPersonne;
    }

    public function getNom() {
    	return $this->nom;
    }

    /**
    * @param $nom
    */
    public function setNom($nom) {
    	$this->nom = $nom;
    }

    public function getPrenom() {
    	return $this->prenom;
    }

    /**
    * @param $prenom
    */
    public function setPrenom($prenom) {
    	$this->prenom = $prenom;
    }

    public function getAuteur() {
    	return $this->auteur;
    }

    /**
    * @param $auteur
    */
    public function setAuteur($auteur) {
    	$this->auteur = $auteur;
    }
}