<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Adresse;

class LoadAdresse extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
       
        $adresse1 = new Adresse();
        $adresse1->setEtat($this->getReference('etat7'));
        $adresse1->setClient($this->getReference('client1'));
        $adresse1->setType('livraison');
        $adresse1->setAdresse('22 rue de la carpe');
        $adresse1->setCp('13200');
        $adresse1->setVille('Marseille');
        $adresse1->setPays('France');
        $manager->persist($adresse1);  
        
        $adresse2 = new Adresse();
        $adresse2->setEtat($this->getReference('etat7'));
        $adresse2->setClient($this->getReference('client2'));
        $adresse2->setType('livraison');
        $adresse2->setAdresse('35 rue de la mare');
        $adresse2->setCp('75001');
        $adresse2->setVille('Paris');
        $adresse2->setPays('France');
        $manager->persist($adresse2);  
        
        $adresse3 = new Adresse();
        $adresse3->setEtat($this->getReference('etat7'));
        $adresse3->setClient($this->getReference('client3'));
        $adresse3->setType('livraison');
        $adresse3->setAdresse('52 avenue de la gare');
        $adresse3->setCp('67215');
        $adresse3->setVille('Strasbourg');
        $adresse3->setPays('France');
        $manager->persist($adresse3);  
        
        $adresse4 = new Adresse();
        $adresse4->setEtat($this->getReference('etat7'));
        $adresse4->setClient($this->getReference('client4'));
        $adresse4->setType('livraison');
        $adresse4->setAdresse('51 rue Saint Anne');
        $adresse4->setCp('75012');
        $adresse4->setVille('Paris');
        $adresse4->setPays('France');
        $manager->persist($adresse4);  
            
        $manager->flush();
  }
  
  public function getOrder()
  {
      return 8;
  }
}


