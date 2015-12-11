-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 21 Novembre 2014 à 15:32
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
  `prenom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `est_super_admin` tinyint(1) NOT NULL,
  `mdp` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_administrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `etat_id` int(11) DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_adresse`),
  KEY `IDX_C35F0816D5E86FF` (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `attributproduit`
--

CREATE TABLE IF NOT EXISTS `attributproduit` (
  `id_attribut_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_attribut_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `attributvaleur`
--

CREATE TABLE IF NOT EXISTS `attributvaleur` (
  `id_attribut_valeur` int(11) NOT NULL AUTO_INCREMENT,
  `attribut_produit_id_attribut_produit` int(11) DEFAULT NULL,
  `nom` int(11) DEFAULT NULL,
  `attibut_produit_id` int(11) NOT NULL,
  PRIMARY KEY (`id_attribut_valeur`),
  KEY `IDX_3250D195DD2FD665` (`attribut_produit_id_attribut_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(28, 'Ordinateur'),
(29, 'Téléphone'),
(30, 'Appareil photos');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_has_attributproduit`
--

CREATE TABLE IF NOT EXISTS `categorie_has_attributproduit` (
  `categorie_id_categorie` int(11) NOT NULL,
  `attribut_produit_id_attribut_produit` int(11) NOT NULL,
  PRIMARY KEY (`categorie_id_categorie`,`attribut_produit_id_attribut_produit`),
  KEY `IDX_346870D7B04B2C91` (`categorie_id_categorie`),
  KEY `IDX_346870D7DD2FD665` (`attribut_produit_id_attribut_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL,
  `adresse_id_adresse` int(11) NOT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `civilite` enum('M.','Mme') COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `telephone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_naissance` datetime NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime DEFAULT NULL,
  PRIMARY KEY (`id_client`,`adresse_id_adresse`),
  KEY `IDX_C744045572DFD111` (`adresse_id_adresse`),
  KEY `IDX_C7440455D5E86FF` (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `mode_paiement` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `client_ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_commande` datetime NOT NULL,
  `date_paiement` datetime NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `IDX_6EEAA67DB2BB0E85` (`mode_paiement`),
  KEY `IDX_6EEAA67DD5E86FF` (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande_has_produit`
--

CREATE TABLE IF NOT EXISTS `commande_has_produit` (
  `commande_id_commande` int(11) NOT NULL,
  `produit_id_produit` int(11) NOT NULL,
  PRIMARY KEY (`commande_id_commande`,`produit_id_produit`),
  KEY `IDX_7A5019D77C0CF89` (`commande_id_commande`),
  KEY `IDX_7A5019D5E007C5A` (`produit_id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `id_etat` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_etat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=111 ;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id_etat`, `nom`, `type`) VALUES
(100, 'activé', 'adresse'),
(101, 'désactivé', 'adresse'),
(102, 'en cours de validation', 'commande'),
(103, 'en cours de préparation', 'commande'),
(104, 'commande Envoyée', 'commande'),
(105, 'commande livrée', 'commande'),
(106, 'actif', 'client'),
(107, 'non actif', 'client'),
(108, 'en stock', 'produit'),
(109, 'en cours de réapprovisionnement', 'produit'),
(110, 'stock épuisé', 'produit');

-- --------------------------------------------------------

--
-- Structure de la table `modepaiement`
--

CREATE TABLE IF NOT EXISTS `modepaiement` (
  `id_mode_paiement` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_mode_paiement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Contenu de la table `modepaiement`
--

INSERT INTO `modepaiement` (`id_mode_paiement`, `nom`) VALUES
(31, 'Cheque'),
(32, 'Paypal');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `sous_categorie_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `reference` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nom` int(11) NOT NULL,
  `description` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `image` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `IDX_29A5EC27365BF48` (`sous_categorie_id`),
  KEY `IDX_29A5EC27D5E86FF` (`etat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE IF NOT EXISTS `souscategorie` (
  `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) DEFAULT NULL,
  `nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_sous_categorie`),
  KEY `IDX_6FF3A701BCF5E72D` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=66 ;

--
-- Contenu de la table `souscategorie`
--

INSERT INTO `souscategorie` (`id_sous_categorie`, `categorie_id`, `nom`) VALUES
(59, 28, 'Portable'),
(60, 28, 'Bureau'),
(61, 29, 'Portable'),
(62, 29, 'Fixe'),
(63, 30, 'Reflex'),
(64, 30, 'Compact'),
(65, 30, 'bridge');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `FK_C35F0816D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id_etat`);

--
-- Contraintes pour la table `attributvaleur`
--
ALTER TABLE `attributvaleur`
  ADD CONSTRAINT `FK_3250D195DD2FD665` FOREIGN KEY (`attribut_produit_id_attribut_produit`) REFERENCES `attributproduit` (`id_attribut_produit`);

--
-- Contraintes pour la table `categorie_has_attributproduit`
--
ALTER TABLE `categorie_has_attributproduit`
  ADD CONSTRAINT `FK_346870D7DD2FD665` FOREIGN KEY (`attribut_produit_id_attribut_produit`) REFERENCES `attributproduit` (`id_attribut_produit`),
  ADD CONSTRAINT `FK_346870D7B04B2C91` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C7440455D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id_etat`),
  ADD CONSTRAINT `FK_C744045572DFD111` FOREIGN KEY (`adresse_id_adresse`) REFERENCES `adresse` (`id_adresse`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DD5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id_etat`),
  ADD CONSTRAINT `FK_6EEAA67DB2BB0E85` FOREIGN KEY (`mode_paiement`) REFERENCES `modepaiement` (`id_mode_paiement`);

--
-- Contraintes pour la table `commande_has_produit`
--
ALTER TABLE `commande_has_produit`
  ADD CONSTRAINT `FK_7A5019D5E007C5A` FOREIGN KEY (`produit_id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `FK_7A5019D77C0CF89` FOREIGN KEY (`commande_id_commande`) REFERENCES `commande` (`id_commande`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC27D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id_etat`),
  ADD CONSTRAINT `FK_29A5EC27365BF48` FOREIGN KEY (`sous_categorie_id`) REFERENCES `souscategorie` (`id_sous_categorie`);

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `FK_6FF3A701BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
