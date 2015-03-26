<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Client;

class LoadClient extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
          
    $client1 = new Client();
    $client1->setUser($this->getReference('user1'));
    $client1->setEtat($this->getReference('etat1'));
    $client1->setCivilite('M.');
    $client1->setPrenom('Admin');
    $client1->setNom('SuperChef');
    $client1->setNewsletter(0);
    $client1->setPremium(0);
    $client1->setTelephone('0102030405');
    $client1->setDateNaissance(new \DateTime('1992-03-10'));
    $client1->setDateCreation(new \DateTime('now'));
    $manager->persist($client1);

    $client2 = new Client();
    $client2->setUser($this->getReference('user2'));
    $client2->setEtat($this->getReference('etat1'));
    $client2->setCivilite('Mme');
    $client2->setPrenom('User');
    $client2->setNom('UserHeureuse');
    $client2->setNewsletter(0);
    $client2->setPremium(0);
    $client2->setTelephone('0102030405');
    $client2->setDateNaissance(new \DateTime('1982-05-10'));
    $client2->setDateCreation(new \DateTime('now'));
    $manager->persist($client2);

    $client3 = new Client();
    $client3->setUser($this->getReference('user3'));
    $client3->setEtat($this->getReference('etat1'));
    $client3->setCivilite('Mme');
    $client3->setPrenom('Caroline');
    $client3->setNom('Bleïer');
    $client3->setNewsletter(0);
    $client3->setPremium(0);
    $client3->setTelephone('0102030405');
    $client3->setDateNaissance(new \DateTime('1974-09-01'));
    $client3->setDateCreation(new \DateTime('now'));
    $manager->persist($client3);

    $client4 = new Client();
    $client4->setUser($this->getReference('user4'));
    $client4->setEtat($this->getReference('etat1'));
    $client4->setCivilite('M.');
    $client4->setPrenom('Slim');
    $client4->setNom('Fouzri');
    $client4->setNewsletter(0);
    $client4->setPremium(0);
    $client4->setTelephone('0102030405');
    $client4->setDateNaissance(new \DateTime('1990-02-29'));
    $client4->setDateCreation(new \DateTime('now'));
    $manager->persist($client4);

    $manager->flush();
    
    $this->addReference('client1', $client1);
    $this->addReference('client2', $client2);
    $this->addReference('client3', $client3);
    $this->addReference('client4', $client4);
  }
  
  public function getOrder()
  {
      return 7;
  }
  
}