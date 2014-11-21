-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 20 Novembre 2014 à 11:43
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `odysseus`
--
CREATE DATABASE IF NOT EXISTS `odysseus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `odysseus`;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `estSuperAdmin` tinyint(1) NOT NULL,
  `mdp` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idAdministrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `idAdresse` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `idClient` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `modePaiement` tinyint(4) NOT NULL,
  `etatId` tinyint(4) NOT NULL,
  PRIMARY KEY (`idAdresse`),
  KEY `fk_Adresse_Etat1_idx` (`etatId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `attributproduit`
--

CREATE TABLE IF NOT EXISTS `attributproduit` (
  `idAttributProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `categorieId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAttributProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `attributvaleur`
--

CREATE TABLE IF NOT EXISTS `attributvaleur` (
  `idAttributValeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) DEFAULT NULL,
  `AttibutProduitId` int(11) NOT NULL,
  `AttributProduit_idAttributProduit` int(11) NOT NULL,
  PRIMARY KEY (`idAttributValeur`),
  KEY `fk_AttributValeur_AttributProduit1_idx` (`AttributProduit_idAttributProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_has_attributproduit`
--

CREATE TABLE IF NOT EXISTS `categorie_has_attributproduit` (
  `Categorie_idCategory` int(11) NOT NULL,
  `AttributProduit_idAttributProduit` int(11) NOT NULL,
  PRIMARY KEY (`Categorie_idCategory`,`AttributProduit_idAttributProduit`),
  KEY `fk_Categorie_has_AttributProduit_AttributProduit1_idx` (`AttributProduit_idAttributProduit`),
  KEY `fk_Categorie_has_AttributProduit_Categorie1_idx` (`Categorie_idCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `dateDeNaissance` datetime NOT NULL,
  `etatId` tinyint(4) NOT NULL,
  `dateDeCreation` datetime NOT NULL,
  `dateDeModification` datetime DEFAULT NULL,
  `Adresse_idAdresse` int(11) NOT NULL,
  PRIMARY KEY (`idClient`,`Adresse_idAdresse`),
  KEY `fk_Client_Adresse1_idx` (`Adresse_idAdresse`),
  KEY `fk_Client_Etat1_idx` (`etatId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `clientId` int(11) NOT NULL,
  `clientIp` varchar(45) NOT NULL,
  `dateCommande` datetime NOT NULL,
  `datePaiement` datetime NOT NULL,
  `montant` int(11) NOT NULL,
  `modePaiement` tinyint(4) NOT NULL,
  `etatId` tinyint(4) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `fk_Commande_modePaiement1_idx` (`modePaiement`),
  KEY `fk_Commande_etat1_idx` (`etatId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande_has_produit`
--

CREATE TABLE IF NOT EXISTS `commande_has_produit` (
  `Commande_idCommande` int(11) NOT NULL,
  `Produit_idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`Commande_idCommande`,`Produit_idProduit`),
  KEY `fk_Commande_has_Produit_Produit1_idx` (`Produit_idProduit`),
  KEY `fk_Commande_has_Produit_Commande1_idx` (`Commande_idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `idEtat` tinyint(4) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`idEtat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modepaiement`
--

CREATE TABLE IF NOT EXISTS `modepaiement` (
  `idModePaiement` tinyint(4) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idModePaiement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(40) NOT NULL,
  `nom` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL,
  `sousCategorieId` int(11) NOT NULL,
  `categorieId` int(11) NOT NULL,
  `Produitcol` varchar(45) NOT NULL,
  `image` varchar(45) NOT NULL,
  `etatId` tinyint(4) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `fk_Produit_SousCategorie1_idx` (`sousCategorieId`),
  KEY `fk_Produit_Etat1_idx` (`etatId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE IF NOT EXISTS `souscategorie` (
  `idSousCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorieId` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idSousCategorie`),
  KEY `fk_SousCategorie_Categorie1_idx` (`categorieId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `fk_Adresse_Etat1` FOREIGN KEY (`etatId`) REFERENCES `etat` (`idEtat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `attributvaleur`
--
ALTER TABLE `attributvaleur`
  ADD CONSTRAINT `fk_AttributValeur_AttributProduit1` FOREIGN KEY (`AttributProduit_idAttributProduit`) REFERENCES `attributproduit` (`idAttributProduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `categorie_has_attributproduit`
--
ALTER TABLE `categorie_has_attributproduit`
  ADD CONSTRAINT `fk_Categorie_has_AttributProduit_Categorie1` FOREIGN KEY (`Categorie_idCategory`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Categorie_has_AttributProduit_AttributProduit1` FOREIGN KEY (`AttributProduit_idAttributProduit`) REFERENCES `attributproduit` (`idAttributProduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_Client_Adresse1` FOREIGN KEY (`Adresse_idAdresse`) REFERENCES `adresse` (`idAdresse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Client_Etat1` FOREIGN KEY (`etatId`) REFERENCES `etat` (`idEtat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_Commande_modePaiement1` FOREIGN KEY (`modePaiement`) REFERENCES `modepaiement` (`idModePaiement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commande_etat1` FOREIGN KEY (`etatId`) REFERENCES `etat` (`idEtat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commande_has_produit`
--
ALTER TABLE `commande_has_produit`
  ADD CONSTRAINT `fk_Commande_has_Produit_Commande1` FOREIGN KEY (`Commande_idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commande_has_Produit_Produit1` FOREIGN KEY (`Produit_idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_Produit_SousCategorie1` FOREIGN KEY (`sousCategorieId`) REFERENCES `souscategorie` (`idSousCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produit_Etat1` FOREIGN KEY (`etatId`) REFERENCES `etat` (`idEtat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `fk_SousCategorie_Categorie1` FOREIGN KEY (`categorieId`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
