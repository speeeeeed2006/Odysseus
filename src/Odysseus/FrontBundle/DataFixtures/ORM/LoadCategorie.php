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
    /*$categories = array(
      array('Ordinateur', 1),
      array('Téléphone', 0),
      array('Appareil photos', 0)
    );
    
    foreach ($categories as $i => $value) {
        // On crée la catégorie
        
        $categorie = new Categorie();
        $categorie->setNom($value[0]);
        $categorie->setAlaune($value[1]);
            
         // On persiste la catégorie
        $manager->persist($categorie);
         
        $this->addReference("categorie".$i, $categorie);
        $i++;
    }*/
    
     // On crée la catégorie
    $categorie1 = new Categorie();
    $categorie1->setNom('Ordinateur');
    $categorie1->setAlaune(1);
    $manager->persist($categorie1);

    $categorie2 = new Categorie();
    $categorie2->setNom('Téléphone');
    $categorie2->setAlaune(0);
    $manager->persist($categorie2);
    
    $categorie3 = new Categorie();
    $categorie3->setNom('Appareil photos');
    $categorie3->setAlaune(0);
    $manager->persist($categorie3);
    
    $manager->flush();
         
    $this->addReference('categorie1', $categorie1);
    $this->addReference('categorie2', $categorie2);
    $this->addReference('categorie3', $categorie3);

    
  }
  public function getOrder()
  {
      return 2;
  }
  
}

