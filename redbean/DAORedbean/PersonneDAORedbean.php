<?php

// Connection redbean à la bdd redbeanLivre
R::setup('mysql:host=127.0.0.1;dbname=redbeanLivre', 'root', '');

// Ajout ORM redbean
require_once "../redbean.php";

class PersonneDAORedbean implements PersonneInterface{
        
    /**
     * Read all
     * @returns {$personne}
    */
    public function afficherLesPersonnes(){
        $personne = R::findAll('personne');
        return $personne;
    }

    /**
     * Read 
     * @params {int $idPersonne}
     * @returns {$personne}
    */
    public function afficherPersonne(int $idPersonne){
        $personne = R::load( 'personne', $idPersonne);
        return $personne;
    }

    /**
     * Create 
     * @params {int $idPersonne, string $nom, string $prenom, int $auteur}
    */
    public function ajouterPersonne(int $idPersonne, string $nom, string $prenom, int $auteur){
        $personne = R::dispense( 'personne' );
        $personne->nom = $idPersonne->getNom();
        $personne->prenom = $idPersonne->getPrenom();
        $personne->auteur = $idPersonne->getAuteur();
        $idPersonne = R::store( $personne );
    }

    /**
     * Update 
     * @params {int $idPersonne, string $nom, string $prenom, int $auteur}
    */
    public function modifierPersonne(int $idPersonne, string $nom, string $prenom, int $auteur){
        $personne = R::load( 'personne', $idPersonne->getidPersonne());
        $personne->nom = $idPersonne->getNom();
        $personne->prenom = $idPersonne->getPrenom();
        $personne->auteur = $idPersonne->getAuteur();
        $idPersonne = R::store($personne);
    }

    /**
     * Delete 
     * @params {int $idPersonne}
    */
    public function supprimerPersonne(int $idPersonne){
        $personne = R::load('personne', $idPersonne);
        R::trash($personne);
    }
}
?>
