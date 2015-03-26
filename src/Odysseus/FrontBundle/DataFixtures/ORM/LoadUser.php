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
        $manager->persist($user1);
        
        
        $user2 = new User();
        $user2->setUsername('user');
        $user2->setEmail('user@user.fr');
        $user2->setEnabled(1);
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user2);
        $user2->setPassword($encoder->encodePassword('secret', $user2->getSalt()));
        $manager->persist($user2);
        
        $user3 = new User();
        $user3->setUsername('caro');
        $user3->setEmail('caro@caro.fr');
        $user3->setEnabled(1);
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user3);
        $user3->setPassword($encoder->encodePassword('secret', $user3->getSalt()));
        $manager->persist($user3);
        
        $user4 = new User();
        $user4->setUsername('slim');
        $user4->setEmail('slim@slim.fr');
        $user4->setEnabled(1);
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user4);
        $user4->setPassword($encoder->encodePassword('secret', $user4->getSalt()));
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