<?php
interface LivreInterface{
    
    // Méthodes interface CRUD class Livre

    // Afficher tous les livres
    public function afficherLesLivres();

    // Afficher un livre par idLivre
    public function afficherLivre(int $idLivre);

    // Modifier un livre avec son idLivre, nom, prenom, auteur
    public function ajouterLivre(int $idLivre, string $titre, string $genre, int $idAuteur);

    // Modifier un livre avec son idLivre, nom, prenom, auteur
    public function modifierLivre(int $idLivre, string $titre, string $genre, int $idAuteur);
    
    // Supprimer un livre avec son idLivre
    public function supprimerLivre(int $idLivre);
}
?>
