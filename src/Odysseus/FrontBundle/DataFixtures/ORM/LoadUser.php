<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Odysseus\UserBundle\Entity\User;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
       /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('admin');
        $user1->setEmail('admin@admin.fr');
        $user1->setEnabled(1);
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user1);
        $user1->setPassword($encoder->encodePassword('secret', $user1->getSalt()));
        $user1->setCivilite('M.');
        $user1->setPrenom('Admin');
        $user1->setNom('SuperChef');
        $user1->setNewsletter(0);
        $user1->setPremium(0);
        $user1->setTelephone('0102030405');
        $user1->setDateNaissance(new \DateTime('1992-03-10'));
        $user1->setDateCreation(new \DateTime('now'));
<<<<<<< HEAD
        $user1->setEtat($this->getReference('etat4'));
=======
        $user1->setEtat($this->getReference('etat1'));
>>>>>>> origin/predev2
        $manager->persist($user1);
        
        
        $user2 = new User();
        $user2->setUsername('user');
        $user2->setEmail('user@user.fr');
        $user2->setEnabled(1);
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user2);
        $user2->setPassword($encoder->encodePassword('secret', $user2->getSalt()));
        $user2->setCivilite('Mme');
        $user2->setPrenom('User');
        $user2->setNom('UserHeureuse');
        $user2->setNewsletter(0);
        $user2->setPremium(0);
        $user2->setTelephone('0102030405');
        $user2->setDateNaissance(new \DateTime('1982-05-10'));
        $user2->setDateCreation(new \DateTime('now'));
        $user2->setEtat($this->getReference('etat1'));
        $manager->persist($user2);
        
        $user3 = new User();
        $user3->setUsername('caro');
        $user3->setEmail('caro@caro.fr');
        $user3->setEnabled(1);
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user3);
        $user3->setPassword($encoder->encodePassword('secret', $user3->getSalt()));
        $user3->setCivilite('Mme');
        $user3->setPrenom('Caroline');
        $user3->setNom('Bleïer');
        $user3->setNewsletter(0);
        $user3->setPremium(0);
        $user3->setTelephone('0102030405');
        $user3->setDateNaissance(new \DateTime('1974-09-01'));
        $user3->setDateCreation(new \DateTime('now'));
        $user3->setEtat($this->getReference('etat1'));
        $manager->persist($user3);
        
        $user4 = new User();
        $user4->setUsername('slim');
        $user4->setEmail('slim@slim.fr');
        $user4->setEnabled(1);
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user4);
        $user4->setPassword($encoder->encodePassword('secret', $user4->getSalt()));
        $user4->setCivilite('M.');
        $user4->setPrenom('Slim');
        $user4->setNom('Fouzri');
        $user4->setNewsletter(0);
        $user4->setPremium(0);
        $user4->setTelephone('0102030405');
        $user4->setDateNaissance(new \DateTime('1990-02-29'));
        $user4->setDateCreation(new \DateTime('now'));
        $user4->setEtat($this->getReference('etat1'));
        $manager->persist($user4);
           
        $manager->flush();
        
        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
        $this->addReference('user4', $user4);

   }
  
    public function getOrder()
    {
        return 6;
    }
  
}