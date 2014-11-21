<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Categorie;

class LoadCategorie extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $noms = array(
      'Ordinateur',
      'Téléphone',
      'Appareil photos'
    );
    $i=1;
    foreach ($noms as $value) {
        // On crée la catégorie
            $categorie = new Categorie();
            $categorie->setNom($value);
            
         // On persiste la catégorie
         $manager->persist($categorie);
         
         $this->addReference("categorie_".$i, $categorie);
        $i++;
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
  public function getOrder() {
      return 1;
  }
  
}

