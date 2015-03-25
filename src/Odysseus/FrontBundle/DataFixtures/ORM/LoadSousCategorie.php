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
    /*$noms = array(
      array('Portable','Bureau'),
      array('Portable','Fixe'),
      array('Reflex','Compact', 'Bridge')
    );
    
    foreach ($noms as $i => $value) {
          
        foreach ($value as $nom) {
            
            // On crée la sous catégorie
            $sousCategorie = new Souscategorie();
            $sousCategorie->setNom($nom);
            $sousCategorie->setCategorie($this->getReference('categorie'.$i));

            // On persiste la sous catégorie
            $manager->persist($sousCategorie);
             $i++; 
        }   
    }*/
    
        $sousCategorie1 = new Souscategorie();
        $sousCategorie1->setNom('Portable');
        $sousCategorie1->setCategorie($this->getReference('categorie1'));
        $manager->persist($sousCategorie1);
        
        $sousCategorie2 = new Souscategorie();
        $sousCategorie2->setNom('Bureau');
        $sousCategorie2->setCategorie($this->getReference('categorie1'));
        $manager->persist($sousCategorie2);
        
        $sousCategorie3 = new Souscategorie();
        $sousCategorie3->setNom('Portable');
        $sousCategorie3->setCategorie($this->getReference('categorie2'));
        $manager->persist($sousCategorie3);
        
        $sousCategorie4 = new Souscategorie();
        $sousCategorie4->setNom('Fixe');
        $sousCategorie4->setCategorie($this->getReference('categorie2'));
        $manager->persist($sousCategorie4);
        
        $sousCategorie5 = new Souscategorie();
        $sousCategorie5->setNom('Reflex');
        $sousCategorie5->setCategorie($this->getReference('categorie3'));
        $manager->persist($sousCategorie4);
        
        $sousCategorie5 = new Souscategorie();
        $sousCategorie5->setNom('Compact');
        $sousCategorie5->setCategorie($this->getReference('categorie3'));
        $manager->persist($sousCategorie5);
    
        $manager->flush();
        
        $this->addReference('sousCategorie1', $sousCategorie1);
        $this->addReference('sousCategorie2', $sousCategorie2);
        $this->addReference('sousCategorie3', $sousCategorie3);
        $this->addReference('sousCategorie4', $sousCategorie4);
        $this->addReference('sousCategorie5', $sousCategorie5);
  }
  
  public function getOrder()
  {
      return 3;
  }

  
}