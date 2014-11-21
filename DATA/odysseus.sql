-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 21 Novembre 2014 à 11:10
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
  `id_administrateur` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `est_super_admin` tinyint(1) NOT NULL,
  `mdp` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_administrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `id_client` int(11) NOT NULL,
  `etat_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_adresse`),
  KEY `fk_Adresse_Etat1_idx` (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `attributproduit`
--

CREATE TABLE IF NOT EXISTS `attributproduit` (
  `id_attribut_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_attribut_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `attributvaleur`
--

CREATE TABLE IF NOT EXISTS `attributvaleur` (
  `id_attribut_valeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) DEFAULT NULL,
  `attibut_produit_id` int(11) NOT NULL,
  `attribut_produit_id_attribut_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_attribut_valeur`),
  KEY `fk_AttributValeur_AttributProduit1_idx` (`attribut_produit_id_attribut_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_has_attributproduit`
--

CREATE TABLE IF NOT EXISTS `categorie_has_attributproduit` (
  `categorie_id_categorie` int(11) NOT NULL,
  `attribut_produit_id_attribut_produit` int(11) NOT NULL,
  PRIMARY KEY (`categorie_id_categorie`,`attribut_produit_id_attribut_produit`),
  KEY `fk_Categorie_has_AttributProduit_AttributProduit1_idx` (`attribut_produit_id_attribut_produit`),
  KEY `fk_Categorie_has_AttributProduit_Categorie1_idx` (`categorie_id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `date_naissance` datetime NOT NULL,
  `etat_id` tinyint(4) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime DEFAULT NULL,
  `adresse_id_adresse` int(11) NOT NULL,
  PRIMARY KEY (`id_client`,`adresse_id_adresse`),
  KEY `fk_Client_Adresse1_idx` (`adresse_id_adresse`),
  KEY `fk_Client_Etat1_idx` (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `client_ip` varchar(45) NOT NULL,
  `date_commande` datetime NOT NULL,
  `date_paiement` datetime NOT NULL,
  `montant` int(11) NOT NULL,
  `mode_paiement` tinyint(4) NOT NULL,
  `etat_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_Commande_modePaiement1_idx` (`mode_paiement`),
  KEY `fk_Commande_etat1_idx` (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande_has_produit`
--

CREATE TABLE IF NOT EXISTS `commande_has_produit` (
  `commande_id_commande` int(11) NOT NULL,
  `produit_id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`commande_id_commande`,`produit_id_produit`),
  KEY `fk_Commande_has_Produit_Produit1_idx` (`produit_id_produit`),
  KEY `fk_Commande_has_Produit_Commande1_idx` (`commande_id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `id_etat` tinyint(4) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_etat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modepaiement`
--

CREATE TABLE IF NOT EXISTS `modepaiement` (
  `id_mode_paiement` tinyint(4) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_mode_paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(40) NOT NULL,
  `nom` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL,
  `sous_categorie_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `image` varchar(45) NOT NULL,
  `etat_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_Produit_SousCategorie1_idx` (`sous_categorie_id`),
  KEY `fk_Produit_Etat1_idx` (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE IF NOT EXISTS `souscategorie` (
  `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_sous_categorie`),
  KEY `fk_SousCategorie_Categorie1_idx` (`categorie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `fk_Adresse_Etat1` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id_etat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `attributvaleur`
--
ALTER TABLE `attributvaleur`
  ADD CONSTRAINT `fk_AttributValeur_AttributProduit1` FOREIGN KEY (`attribut_produit_id_attribut_produit`) REFERENCES `attributproduit` (`id_attribut_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `categorie_has_attributproduit`
--
ALTER TABLE `categorie_has_attributproduit`
  ADD CONSTRAINT `fk_Categorie_has_AttributProduit_Categorie1` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Categorie_has_AttributProduit_AttributProduit1` FOREIGN KEY (`attribut_produit_id_attribut_produit`) REFERENCES `attributproduit` (`id_attribut_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_Client_Adresse1` FOREIGN KEY (`adresse_id_adresse`) REFERENCES `adresse` (`id_adresse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Client_Etat1` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id_etat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_Commande_modePaiement1` FOREIGN KEY (`mode_paiement`) REFERENCES `modepaiement` (`id_mode_paiement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commande_etat1` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id_etat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commande_has_produit`
--
ALTER TABLE `commande_has_produit`
  ADD CONSTRAINT `fk_Commande_has_Produit_Commande1` FOREIGN KEY (`commande_id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commande_has_Produit_Produit1` FOREIGN KEY (`produit_id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_Produit_SousCategorie1` FOREIGN KEY (`sous_categorie_id`) REFERENCES `souscategorie` (`id_sous_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produit_Etat1` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id_etat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `fk_SousCategorie_Categorie1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
