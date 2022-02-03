<?php
interface GenreInterface{

    // Méthodes interface CRUD class Genre

    // Afficher tous les genres
    public function afficherGenres();

    // Afficher un genre par idGenre
    public function afficherGenre(int $idGenre);

    // Modifier un genre avec son idGenre, nomGenre
    public function ajouterGenre(int $idGenre, string $nomGenre);

    // Modifier un genre avec son idGenre, nomGenre
    public function modifierGenre(int $idGenre, string $nomGenre);

    // Supprimer un genre avec son idGenre
    public function supprimerGenre(int $idGenre);
}
?>
