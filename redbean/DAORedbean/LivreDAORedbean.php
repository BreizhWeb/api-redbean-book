<?php

// Connection redbean à la bdd redbeanLivre
R::setup('mysql:host=127.0.0.1;dbname=redbeanLivre', 'root', '');

// Ajout ORM redbean
require_once "../redbean.php";

class LivreDAORedbean implements LivreInterface{

     /**
     * Read all
     * @returns {$livre}
    */
    public function afficherLesLivres(){
        $livre = R::findAll('livre');
        return $livre;
    }

    /**
     * Read 
     * @params {int $idLivre}
     * @returns {$livre}
    */
    public function afficherLivre(int $idLivre){
        $livre = R::load( 'livre', $idLivre);
        return $livre;
    }

    /**
     * Create 
     * @params {int $idLivre,string $titre,string $genre,int $idAuteur}
    */
    public function ajouterLivre(int $idLivre,string $titre,string $genre,int $idAuteur){
        $livre = R::dispense( 'livre' );
        $livre->titre = $idLivre->getTitre();
        $livre->genre = $idLivre->getGenre();
        $livre->idAuteur = $idLivre->getIdAuteur();
        $idLivre = R::store( $livre );
    }

    /**
     * Update 
     * @params {int $idLivre,string $titre,string $genre,int $idAuteur}
    */
    public function modifierLivre(int $idLivre,string $titre,string $genre,int $idAuteur){
        $livre = R::load( 'livre', $idLivre->getIdGenre());
        $livre->titre = $idLivre->getTitre();
        $livre->genre = $idLivre->getGenre();
        $livre->idAuteur = $idLivre->getIdAuteur();
        $idLivre = R::store($livre); 
    }

    
    /**
     * Delete 
     * @params {int $idLivre}
    */
    public function supprimerLivre(int $idLivre){
        $livre = R::load('livre', $idLivre);
        R::trash($livre);
    }
}
?>
