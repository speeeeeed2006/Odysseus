<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Etat;

class LoadEtat extends AbstractFixture implements OrderedFixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms des etats à ajouter
    /*$etats = array(
        'client'        => array('actif','banni'),
        'produit'       => array('a_valider','valide', 'refuse', 'desactive'),
        'adresse'       => array('valide','obsolete'),
        'commande'      => array('en_attente_paiement', 'paye', 'en_cours_livraison', 'livre'),     
    );
    
    foreach ($etats as $i => $values) {
        foreach ($values as $value){
            $etat = new Etat();
            $etat->setNom($value);
            $etat->setType($i);
            
            // On persiste l'etat
            $manager->persist($etat);
            
            $this->addReference("etat".$i, $etat);
            $i++;
        }
    }*/
   
    $etat1 = new Etat();
    $etat1->setNom('actif');
    $etat1->setType('client');
    $manager->persist($etat1);

    $etat2 = new Etat();
    $etat2->setNom('banni');
    $etat2->setType('client');
    $manager->persist($etat2);

    $etat3 = new Etat();
    $etat3->setNom('a_valider');
    $etat3->setType('produit');
    $manager->persist($etat3);

    $etat4 = new Etat();
    $etat4->setNom('valide');
    $etat4->setType('produit');
    $manager->persist($etat4);

    $etat5 = new Etat();
    $etat5->setNom('refuse');
    $etat5->setType('produit');
    $manager->persist($etat5);

    $etat6 = new Etat();
    $etat6->setNom('desactive');
    $etat6->setType('produit');
    $manager->persist($etat6);

    $etat7 = new Etat();
    $etat7->setNom('valide');
    $etat7->setType('adresse');
    $manager->persist($etat7);

    $etat8 = new Etat();
    $etat8->setNom('obsolete');
    $etat8->setType('adresse');
    $manager->persist($etat8);

    $etat9 = new Etat();
    $etat9->setNom('en_attente_paiement');
    $etat9->setType('commande');
    $manager->persist($etat9);

    $etat10 = new Etat();
    $etat10->setNom('paye');
    $etat10->setType('commande');
    $manager->persist($etat10);

    $etat11 = new Etat();
    $etat11->setNom('en_cours_livraison');
    $etat11->setType('commande');
    $manager->persist($etat11);

    $etat12 = new Etat();
    $etat12->setNom('livre');
    $etat12->setType('commande');
    $manager->persist($etat12);
    
    // On déclenche l'enregistrement de toutes les etats
    $manager->flush();

    $this->addReference('etat1', $etat1);
    $this->addReference('etat2', $etat2);
    $this->addReference('etat3', $etat3);
    $this->addReference('etat4', $etat4);
    $this->addReference('etat5', $etat5);
    $this->addReference('etat6', $etat6);
    $this->addReference('etat7', $etat7);
    $this->addReference('etat8', $etat8);
    $this->addReference('etat9', $etat9);
    $this->addReference('etat10', $etat10);
    $this->addReference('etat11', $etat11);
    $this->addReference('etat12', $etat12);
       

  }
  
  public function getOrder()
  {
      return 1;
  }
}