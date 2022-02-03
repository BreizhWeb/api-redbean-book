<?php
interface PersonneInterface{

    // Méthodes interface CRUD class Personne

    // Afficher tous les personnes
    public function afficherLesPersonnes();

    // Afficher la personne par idPersonne
    public function afficherPersonne(int $idPersonne);

    // Ajouter une personne avec son idPersonne, nom, prenom, auteur
    public function ajouterPersonne(int $idPersonne, string $nom, string $prenom, int $auteur);

    // Modifier une personne avec son idPersonne, nom, prenom, auteur
    public function modifierPersonne(int $idPersonne, string $nom, string $prenom, int $auteur);

    // Supprimer une personne avec son idPersonne
    public function supprimerPersonne(int $idPersonne);
}
?>
