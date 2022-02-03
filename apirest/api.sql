-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 fév. 2022 à 00:19
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api`
--

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

DROP TABLE IF EXISTS `bibliotheque`;
CREATE TABLE IF NOT EXISTS `bibliotheque` (
  `idBibliotheque` int NOT NULL,
  `idLivre` int NOT NULL,
  `idPersonne` int NOT NULL,
  PRIMARY KEY (`idBibliotheque`),
  KEY `fk_id_livreP` (`idLivre`),
  KEY `fk_id_personneP` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int NOT NULL AUTO_INCREMENT,
  `nomGenre` varchar(20) NOT NULL,
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `nomGenre`) VALUES
(1, ' Roman'),
(2, 'TestGenreModif'),
(3, ' Fantastique'),
(4, ' Horreur'),
(5, ' Conte'),
(6, ' Science-fiction'),
(7, 'TestNomAdd');

-- --------------------------------------------------------

--
-- Structure de la table `genre_livre`
--

DROP TABLE IF EXISTS `genre_livre`;
CREATE TABLE IF NOT EXISTS `genre_livre` (
  `idGenreLivre` int NOT NULL,
  `idGenre` int NOT NULL,
  `idLivre` int NOT NULL,
  PRIMARY KEY (`idGenreLivre`),
  KEY `fk_id_genre` (`idGenre`),
  KEY `fk_id_livre` (`idLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `idLivre` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `idAuteur` int NOT NULL,
  PRIMARY KEY (`idLivre`),
  KEY `fk_auteur` (`idAuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`idLivre`, `titre`, `genre`, `idAuteur`) VALUES
(1, 'Lol', 'Roman', 3),
(2, 'Lol', 'Roman', 3),
(3, 'Lol', 'Roman', 3),
(4, 'Lol', 'Roman', 3),
(5, 'Lol', 'Roman', 3),
(6, 'Lol', 'Roman', 3);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `auteur` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`, `auteur`) VALUES
(2, 'nommm', 'PrenomModif', 1),
(3, 'Leroy', 'Stéphane', 4),
(4, 'Tremblay ', 'Marsilius ', 5),
(5, 'Loiseau', 'Jeanette ', 6),
(6, 'TestNom', 'TestPrenom', 2),
(7, 'TestNom', 'TestPrenom', 2),
(8, 'TestNom', 'TestPrenom', 2),
(9, 'TestNom', 'TestPrenom', 2),
(10, 'TestNom', 'TestPrenom', 2),
(11, 'TestNom', 'TestPrenom', 2),
(12, 'TestNom', 'TestPrenom', 2),
(13, 'TestNom', 'TestPrenom', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  ADD CONSTRAINT `fk_id_livreP` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`),
  ADD CONSTRAINT `fk_id_personneP` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`);

--
-- Contraintes pour la table `genre_livre`
--
ALTER TABLE `genre_livre`
  ADD CONSTRAINT `fk_id_genre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`),
  ADD CONSTRAINT `fk_id_livre` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `fk_auteur` FOREIGN KEY (`idAuteur`) REFERENCES `personne` (`idPersonne`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
