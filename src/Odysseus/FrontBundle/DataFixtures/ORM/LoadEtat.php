<?php

namespace Odysseus\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Odysseus\FrontBundle\Entity\Etat;

class LoadEtat implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $etats = array(
        'adresse'       => array('activé','désactivé'),
        'commande'      => array('en cours de validation', 'en cours de préparation', 'commande Envoyée', 'commande livrée'),
        'client'        => array('actif','non actif'), 
        'produit'       => array('en stock','en cours de réapprovisionnement', 'stock épuisé')
    );
    
    foreach ($etats as $key => $values) {
        foreach ($values as $value){
            $etat = new Etat();
            $etat->setNom($value);
            $etat->setType($key);
            
            // On persiste l'etat
            $manager->persist($etat);
        }
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}