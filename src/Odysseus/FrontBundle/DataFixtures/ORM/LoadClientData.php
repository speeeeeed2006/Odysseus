<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Categorie;
use Odysseus\FrontBundle\Entity\Client;

class LoadClient implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $civilite = array('M.','Mme','M.'); 
    $prenom = array('Slim','Caroline','Stéphane');
    $nom = array('Fouzri','Bleier','Moriggi');
    $newsletter = array(1,0,1);
    $premium = array(0,0,0);
    $telephone = array();
    $email = array();
    $mdp = array();
    $newsletter = array();
    $datedemodification = array();
    $newsletter = array();
    $adresseadresse = array();
    $etatid = array();
    
    
    
    foreach ($noms as $key => $value) {
        // On crée la catégorie
            $categorie = new Categorie();
            $categorie->setNom($key);
        foreach ($value as $nom) {
            // On crée la sous catégorie
            $sousCategorie = new Souscategorie();
            $sousCategorie->setNom($nom);
            $sousCategorie->setCategorieid($categorie);

            // On persiste la sous catégorie
            $manager->persist($sousCategorie);
        }
        // On persiste la catégorie
         $manager->persist($categorie);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}