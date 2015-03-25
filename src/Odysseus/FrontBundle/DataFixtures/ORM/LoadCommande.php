<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Commande;

class LoadCommande extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
 
    $commande1 = new Commande();   
    $commande1->setModePaiement($this->getReference('mode1'));
    $commande1->setEtat($this->getReference('etat9'));
    $commande1->setClient($this->getReference('client2'));
    $commande1->setClientIp('192.168.10.2');
    $commande1->setDateCommande(new \DateTime('now'));
    $commande1->setDatePaiement(new \DateTime('now'));
    $commande1->setMontant('55,00');
    $commande1->setAdresseLivraisonId('2');
    $commande1->setAdresseFacturationId('2');
    $manager->persist($commande1);
    
    $commande2 = new Commande();   
    $commande2->setModePaiement($this->getReference('mode1'));
    $commande2->setEtat($this->getReference('etat10'));
    $commande2->setClient($this->getReference('client3'));
    $commande2->setClientIp('192.168.10.50');
    $commande2->setDateCommande(new \DateTime('now'));
    $commande2->setDatePaiement(new \DateTime('now'));
    $commande2->setMontant('104,00');
    $commande2->setAdresseLivraisonId('3');
    $commande2->setAdresseFacturationId('3');
    $manager->persist($commande2);
        
    $commande3 = new Commande();   
    $commande3->setModePaiement($this->getReference('mode1'));
    $commande3->setEtat($this->getReference('etat9'));
    $commande3->setClient($this->getReference('client4'));
    $commande3->setClientIp('192.168.10.40');
    $commande3->setDateCommande(new \DateTime('now'));
    $commande3->setDatePaiement(new \DateTime('now'));
    $commande3->setMontant('55,00');
    $commande3->setAdresseLivraisonId('4');
    $commande3->setAdresseFacturationId('4');
    $manager->persist($commande3);
     
    $manager->flush();
            
  }          
             
  public function getOrder()
  {
      return 12;
  }
}