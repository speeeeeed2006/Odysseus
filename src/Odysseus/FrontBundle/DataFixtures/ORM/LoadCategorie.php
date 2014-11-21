<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Categorie;
use Odysseus\FrontBundle\Entity\Souscategorie;

class LoadCategorie implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $noms = array(
      'Ordinateur'      => array('Portable','Bureau'),
      'Téléphone'       => array('Portable','Fixe'),
      'Appareil photo'  => array('Reflex','Compact')
    );
    
    foreach ($noms as $key => $value) {
        // On crée la catégorie
            $categorie = new Categorie();
            $categorie->setNom($key);
            
        foreach ($value as $nom) {
            // On crée la sous catégorie
            $sousCategorie = new Souscategorie();
            $sousCategorie->setNom($nom);
            $sousCategorie->setCategorie($categorie);

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