<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Odysseus\FrontBundle\Entity\Image;

class LoadImage extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
       $image1 = new Image();
       $image1->setEtat(Image::ACTIVEE);
       $image1->setNom("test");
       $image1->setPath('jpeg');
       $image1->setProduitVente($this->getReference('produitVente1'));
       $manager->persist($image1);
       
       $image2 = new Image();
       $image2->setEtat(Image::ACTIVEE);
       $image2->setNom("test");
       $image2->setPath('jpeg');
       $image2->setProduitVente($this->getReference('produitVente2'));
       $manager->persist($image2);
       
       $image3 = new Image();
       $image3->setEtat(Image::ACTIVEE);
       $image3->setNom("test");
       $image3->setPath('jpeg');
       $image3->setProduitVente($this->getReference('produitVente3'));
       $manager->persist($image3);
       
       $image4 = new Image();
       $image4->setEtat(Image::ACTIVEE);
       $image4->setNom("test");
       $image4->setPath('jpeg');
       $image4->setProduitVente($this->getReference('produitVente4'));
       $manager->persist($image4);
       
       $image5 = new Image();
       $image5->setEtat(Image::ACTIVEE);
       $image5->setNom("test");
       $image5->setPath('jpeg');
       $image5->setProduitVente($this->getReference('produitVente5'));
       $manager->persist($image5);
       
       
        $this->addReference('image1', $image1);
        $this->addReference('image2', $image2);
        $this->addReference('image3', $image3);
        $this->addReference('image4', $image4);
        $this->addReference('image5', $image5);
        $manager->flush();
   }
  
    public function getOrder()
    {
        return 99;
    }
  
}