<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\ProduitVente;

class LoadProduitVente extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
 
    $produitVente1 = new ProduitVente();   
    $produitVente1->setProduit($this->getReference('produit1'));
    $produitVente1->setUser($this->getReference('user2'));
    $produitVente1->setEtat($this->getReference('etat4'));
    $produitVente1->setStock(3);
    $produitVente1->setRemarque('En très bon état');
    $produitVente1->setPrix('55,00');
    $produitVente1->setDateAjout(new \DateTime('now'));
    $manager->persist($produitVente1);
    
    $produitVente2= new ProduitVente();   
    $produitVente2->setProduit($this->getReference('produit2'));
    $produitVente2->setUser($this->getReference('user2'));
    $produitVente2->setEtat($this->getReference('etat4'));
    $produitVente2->setStock(10);
    $produitVente2->setRemarque('Une rayure sur le côté');
    $produitVente2->setPrix('23,00');
    $produitVente2->setDateAjout(new \DateTime('now'));
    $manager->persist($produitVente2);
            
    $produitVente3 = new ProduitVente();   
    $produitVente3->setProduit($this->getReference('produit3'));
    $produitVente3->setUser($this->getReference('user3'));
    $produitVente3->setEtat($this->getReference('etat4'));
    $produitVente3->setStock(3);
    $produitVente3->setRemarque('Bon état');
    $produitVente3->setPrix('10,00');
    $produitVente3->setDateAjout(new \DateTime('now'));
    $manager->persist($produitVente3);
    
    $produitVente4 = new ProduitVente();   
    $produitVente4->setProduit($this->getReference('produit4'));
    $produitVente4->setUser($this->getReference('user2'));
    $produitVente4->setEtat($this->getReference('etat4'));
    $produitVente4->setStock(3);
    $produitVente4->setRemarque('Rien à dire');
    $produitVente4->setPrix('52,00');
    $produitVente4->setDateAjout(new \DateTime('now'));
    $manager->persist($produitVente4);
    
    $produitVente5 = new ProduitVente();   
    $produitVente5->setProduit($this->getReference('produit5'));
    $produitVente5->setUser($this->getReference('user4'));
    $produitVente5->setEtat($this->getReference('etat4'));
    $produitVente5->setStock(1);
    $produitVente5->setRemarque('Parfait');
    $produitVente5->setPrix('562,00');
    $produitVente5->setDateAjout(new \DateTime('now'));
    $manager->persist($produitVente5);
    
    $manager->flush();
    
    $this->addReference('produitVente1', $produitVente1);
    $this->addReference('produitVente2', $produitVente2);
    $this->addReference('produitVente3', $produitVente3);
    $this->addReference('produitVente4', $produitVente4);
    $this->addReference('produitVente5', $produitVente5);
            
  }          
           
  
  public function getOrder()
  {
      return 9;
  }
}