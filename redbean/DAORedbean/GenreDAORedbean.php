<?php

// Connection redbean à la bdd redbeanLivre
R::setup('mysql:host=127.0.0.1;dbname=redbeanLivre', 'root', '');

// Ajout ORM redbean
require_once "../redbean.php";

class GenreDAORedbean implements GenreInterface{

    /**
     * Read all
     * @returns {$genre}
    */
    public function afficherGenres(){
        $genre = R::findAll('genre');
        return $genre;
    }

    /**
     * Read 
     * @params {int $idGenre}
     * @returns {$genre}
    */
    public function afficherGenre(int $idGenre){
        $genre = R::load( 'genre', $idGenre);
        return $genre;
    }

    /**
     * Create 
     * @params {int $idGenre, string $nomGenre}
    */
    public function ajouterGenre(int $idGenre, string $nomGenre){
        $genre = R::dispense( 'genre' );
        $genre->nomGenre = $idGenre->getNomGenre();
        $idGenre = R::store( $genre );
    }

    /**
     * Update 
     * @params {int $idGenre, string $nomGenre}
    */
    public function modifierGenre(int $idGenre, string $nomGenre){
        $genre = R::load( 'genre', $idGenre->getIdGenre());
        $genre->nomGenre = $idGenre->getNomGenre();
        $idGenre = R::store($genre);
    }

    /**
     * Delete 
     * @params {int $idGenre}
    */
    public function supprimerGenre(int $idGenre){
        $genre = R::load('genre', $idGenre);
        R::trash($genre);
    }
}
?>
