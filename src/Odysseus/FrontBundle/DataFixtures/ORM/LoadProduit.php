<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Produit;

class LoadProduit extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
 
    $produit1 = new Produit();   
    $produit1->setCategorie($this->getReference('categorie1'));
    $produit1->setSousCategorie($this->getReference('sousCategorie1'));
    $produit1->setEtat($this->getReference('etat4'));
    $produit1->setReference('3456');
    $produit1->setMarque('Apple');
    $produit1->setNom('Mac Book Pro');
    $produit1->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint ');
    $produit1->setPromotion(0);
    $produit1->setNouveaute(0);
    $produit1->setAlaune(1); 
    $manager->persist($produit1);
    
    $produit2 = new Produit();   
    $produit2->setCategorie($this->getReference('categorie1'));
    $produit2->setSousCategorie($this->getReference('sousCategorie1'));
    $produit2->setEtat($this->getReference('etat4'));
    $produit2->setReference('123456');
    $produit2->setMarque('Acer');
    $produit2->setNom('Aspire ES15');
    $produit2->setDescription('Lorem ipsum dolor sit amet, consectetur adit labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint ');
    $produit2->setPromotion(0);
    $produit2->setNouveaute(0);
    $produit2->setAlaune(1); 
    $manager->persist($produit2);
    
    $produit3 = new Produit();   
    $produit3->setCategorie($this->getReference('categorie1'));
    $produit3->setSousCategorie($this->getReference('sousCategorie2'));
    $produit3->setEtat($this->getReference('etat4'));
    $produit3->setReference('234556');
    $produit3->setMarque('Apple');
    $produit3->setNom('iBook i7');
    $produit3->setDescription('Lorem ipsum dolor sit amet, consectetur adit labore et dolore magna aliqua. Ut enuis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint ');
    $produit3->setPromotion(0);
    $produit3->setNouveaute(1);
    $produit3->setAlaune(1); 
    $manager->persist($produit3);
    
    $produit4 = new Produit();   
    $produit4->setCategorie($this->getReference('categorie2'));
    $produit4->setSousCategorie($this->getReference('sousCategorie4'));
    $produit4->setEtat($this->getReference('etat3'));
    $produit4->setReference('125689');
    $produit4->setMarque('Gigaset');
    $produit4->setNom('Gigaset 125');
    $produit4->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscicididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam');
    $produit4->setPromotion(0);
    $produit4->setNouveaute(0);
    $produit4->setAlaune(0);
    $manager->persist($produit4); 
    
    $produit5 = new Produit();   
    $produit5->setCategorie($this->getReference('categorie2'));
    $produit5->setSousCategorie($this->getReference('sousCategorie5'));
    $produit5->setEtat($this->getReference('etat4'));
    $produit5->setReference('155977');
    $produit5->setMarque('Pentax');
    $produit5->setNom('Super Reflex 25');
    $produit5->setDescription('Lorem ipsum, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad m');
    $produit5->setPromotion(0);
    $produit5->setNouveaute(0);
    $produit5->setAlaune(0); 
    $manager->persist($produit5);
    
    $manager->flush();
    
    $this->addReference('produit1', $produit1);
    $this->addReference('produit2', $produit2);
    $this->addReference('produit3', $produit3);
    $this->addReference('produit4', $produit4);
    $this->addReference('produit5', $produit5);
            
  }          
           
  
  public function getOrder()
  {
      return 5;
  }
}