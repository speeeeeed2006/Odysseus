<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Modepaiement;

class LoadModePaiement extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
 
        $mode1 = new Modepaiement();
        $mode1->setNom('Cheque');
        $manager->persist($mode1);

        $mode2 = new Modepaiement();
        $mode2->setNom('Paypal');
        $manager->persist($mode2);                      

        $manager->flush();
        
        $this->addReference('mode1', $mode1);
        $this->addReference('mode2', $mode2);
  }
  
  public function getOrder()
  {
      return 4;
  }

}