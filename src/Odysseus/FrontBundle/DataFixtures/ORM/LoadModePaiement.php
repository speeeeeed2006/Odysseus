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
    // Liste des noms de catégorie à ajouter
    $noms = array(
        'Cheque',
        'Paypal'        
    );
    
    foreach ($noms as $nom) {
        // On crée le mode paiement
            $mode = new Modepaiement();
            $mode->setNom($nom);
            
            // On persiste le mode de piement
            $manager->persist($mode);
    }

    // On déclenche l'enregistrement de tous les modes dê paiement
    $manager->flush();
  }
  
  public function getOrder() {
      return 3;
  }

}