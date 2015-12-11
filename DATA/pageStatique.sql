-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 29 Mars 2015 à 20:30
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `odysseus`
--

-- --------------------------------------------------------

--
-- Structure de la table `pagestatique`
--

CREATE TABLE `pagestatique` (
`id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pagestatique`
--

INSERT INTO `pagestatique` (`id_page_statique`, `titre`, `contenu`, `slug`) VALUES
(1, 'Mentions légales', '<h3>Editeur du site</h3>\r\n<p>Odysseus SARL</p>\r\n<h3>Directeur de Publication</h3>\r\n<p>Erwan Letort</p>\r\n<h3>Raison Sociale</h3>\r\n<p>BLOG ECOMMERCE <br/>9 rue de la Poste <br/> 75000 Paris <br/> TVA : FR36510621006</p>\r\n<p>Capital social : 5 000,00 €</p>\r\n<p>SIRET : 510 621 006 00020 R.C.S. Nanterre</p>\r\n<h3>Conception du site</h3>\r\n<p>Odysseus SARL</p>\r\n<h3>Hébergeur</h3>\r\n<p>OVH</p>\r\n<h3>Mentions légales</h3>\r\n<p class="bold">Protection des données personnelles</p>\r\n<p>Conformément à l’article 34 de la loi « Informatique et Libertés », vous disposez d’un droit d’accès, de modification, de rectification et de suppression des données qui vous concernent. <br/>\r\nPour exercer ce droit d’accès, adressez un email avec vos coordonnées à contact@blog-ecommerce.com</p>\r\n<h3>Droit d’auteur et copyright</h3>\r\n<p>L’ensemble des informations présentes sur ce site peuvent être reproduites gratuitement et sans autorisation. Il suffit de citer la source.</p>\r\n<p class="bold">Responsabilités</p>\r\n<p>L’ensemble des informations accessibles via ce site sont fournies en l’état. Odysseus ne donne aucune garantie, explicite ou implicite, et n’assume aucune responsabilité relative à l’utilisation de ces informations.\r\nOdysseus n’est pas responsable ni de l’exactitude, ni des erreurs, ni des omissions contenues sur ce site.\r\nL’utilisateur est seul responsable de l’utilisation de telles informations.</p>\r\n<p>Odysseus se réserve le droit de modifier à tout moment les présentes informations, notamment en actualisant ce site.\r\nOdysseus ne pourra être responsable pour quel que dommage que ce soit tant direct qu’indirect, résultant d’une information contenue sur ce site.\r\nL’utilisateur s’engage à ne transmettre sur ce site aucune information pouvant entrainer une responsabilité civile ou pénale et s’engage à ce titre à ne pas divulguer via ce site des informations illégales, contraires à l’ordre public ou diffamatoires.</p>\r\n<p class="bold">Droit d’accès et modifications</p>\r\n<p>En vertu de l’article 27 de la loi n°78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, vous disposez d’un droit d’accès, de modification, de rectification et de suppression des données qui vous concernent. Vous pouvez à tout moment vous opposer gratuitement et sans motif à la diffusion et/ou à la conservation, par Blog E-commerce.com, des données que vous avez fournies.</p>\r\n<p class="bold">Loi applicable et compétence</p>\r\n<p>Les présentes conditions sont soumises à la loi française. L’attribution de compétence en cas de litige, et à défaut d’accord amiable entre les parties, est donnée aux tribunaux français compétents.</p>', 'mentions-legales'),
(2, 'Conditions générales de vente', '<h3>Article 1 - Objet</h3>\r\n<p>Les conditions générales de ventes décrites ci-après détaillent les droits et obligations de l''entreprise Odysseus et de ses clients dans le cadre de la vente des marchandises suivantes : articles divers.</p>\r\n<p>Toute prestation accomplie par la société Odysseus implique l''adhésion sans réserve de l''acheteur aux présentes conditions générales de vente.</p>\r\n<h3>Article 2 - Présentation des produits</h3>\r\n<p>Les caractéristiques des produits proposés à la vente sont présentées dans la rubrique " Catalogue " de notre site. Les photographies n''entrent pas dans le champ contractuel. La responsabilité de la société Odysseus ne peut être engagée si des erreurs s''y sont introduites. Tous les textes et images présentés sur le site de la société Odysseus sont réservés, pour le monde entier, au titre des droits d''auteur et de propriété intellectuelle; leur reproduction, même partielle, est strictement interdite.<p>\r\n<h3>Article 3 - Durée de validité des offres de vente</h3>\r\n<p>Les produits sont proposés à la vente jusqu''à épuisement du stock. En cas de commande d''un produit devenu indisponible, le client sera informé de cette indisponibilité, dans les meilleurs délais, par courrier électronique ou par courrier postal.</p>\r\n<h3>Article 4 - Prix des produits</h3>\r\n<p>La rubrique " Catalogue " de notre site indique les prix en euros toutes taxes comprises, hors frais de port. Le montant de la TVA est précisé lors de la sélection d''un produit par le client et les frais de port apparaissent sur l''écran à la fin de la sélection des différents produits par le client.</p>\r\n<p>La société Odysseus se réserve le droit de modifier ses prix à tout moment mais les produits commandés sont facturés au prix en vigueur lors de l''enregistrement de la commande.</p>\r\n<p>Les tarifs proposés comprennent les rabais et ristournes que l''entreprise Odysseus serait amenée à octroyer compte tenu de ses résultats ou de la prise en charge par l''acheteur de certaines prestations.</p>\r\n<p>Aucun escompte ne sera accordé en cas de paiement anticipé.</p>\r\n<h3>Article 5 - Commande</h3>\r\n<p>Le client valide sa commande lorsqu''il active le lien " Confirmez votre commande " en bas de la page " Récapitulatif de votre commande " après avoir accepté les présentes conditions de vente. Avant cette validation, il est systématiquement proposé au client de vérifier chacun des éléments de sa commande; il peut ainsi corriger ses erreurs éventuelles.</p>\r\n<p>La société Odysseus confirme la commande par courrier électronique; cette information reprend notamment tous les éléments de la commande et le droit de rétractation du client.</p>\r\n<p>Les données enregistrées par la société Odysseus constituent la preuve de la nature, du contenu et de la date de la commande. Celle-ci est archivée par la société Odysseusdans les conditions et les délais légaux; le client peut accéder à cet archivage en contactant le service Relations Clients.</p>\r\n<h3>Article 6 - Modalités de paiement</h3>\r\n<p>Le règlement des commandes s''effectue par chèque ou carte bancaire.</p>\r\n<p>Lors de l''enregistrement de la commande, l''acheteur devra verser un acompte de 10 % du montant global de la facture, le solde devant être payé à réception des marchandises</p>\r\n<h3>Article 7 - Délai de rétractation</h3>\r\n<p>L''Acheteur dispose d''un délai de quatorze jours francs, à compter de la réception des produits, pour exercer son droit de rétractation sans avoir à justifier de motifs ni à payer de pénalités, à l''exception, le cas échéant, des frais de retour. Si le délai de quatorze jours vient à expirer un samedi, un dimanche ou un jour férié ou chômé, il est prorogé jusqu''au premier jour ouvrable suivant.</p\r\n<p>En cas d''exercice du droit de rétractation, la société rembourse l''Acheteur de la totalité des sommes versées, dans les meilleurs délais et au plus tard dans les trente jours suivant la date à laquelle ce droit a été exercé.</p>\r\n<h3>Article 8 - Livraison</h3>\r\n<p>Tout produit est livré sans garantie quant aux délais, exception faite des livraisons aux particuliers. La date limite de livraison varie suivant leur adresse. Elle est fixée, pour une adresse en France métropolitaine, au jour du paiement + 8 jours et, pour les autres destinations, au jour du paiement + 1 mois.</p>\r\n<h3>Article 9 -  Relations clients - Service après-vente</h3>\r\n<p>Pour toute information, question ou réclamation, le client peut nous contacter :</p>\r\n<p>Adresse : 9 rue de la Poste - Tél : 01 02 03 04 05 - e-mail : info@odysseus.fr</p>', 'cgv');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `pagestatique`
--
ALTER TABLE `pagestatique`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `pagestatique`
--
ALTER TABLE `pagestatique`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;