<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Souscategorie;

class LoadSousCategorie extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $noms = array(
      1         => array('Portable','Bureau'),
      2         => array('Portable','Fixe'),
      3         => array('Reflex','Compact', 'bridge')
    );
    
    foreach ($noms as $key => $value) {
            
        foreach ($value as $nom) {
            // On crée la sous catégorie
            $sousCategorie = new Souscategorie();
            $sousCategorie->setNom($nom);
            $sousCategorie->setCategorie($this->getReference('categorie_'.$key));

            // On persiste la sous catégorie
            $manager->persist($sousCategorie);
        }
        
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
  public function getOrder() {
      return 2;
  }

  
}