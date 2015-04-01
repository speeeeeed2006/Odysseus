<?php 
namespace Odysseus\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{ 

    public function getClientCommande($commande)
    {   
        return $this->createQueryBuilder('u')
                    ->join('u.id', 'c')
                    ->where('c.idCommande = :commande' )
                    ->setParameter('commande' , $commande->getIdCommande()) 
                    ->getQuery()
                    ->getSingleResult();
    }
    
}