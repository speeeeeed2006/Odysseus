<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class CommandeHasProduitVenteRepository extends EntityRepository
{
    public function getProduitOfCommande(\Odysseus\FrontBundle\Entity\Commande $commande)
    {   
        return $this->createQueryBuilder('c')
                    ->where('c.commande = :commande' )
                    ->setParameter('commande' , $commande->getIdCommande()) 
                    ->getQuery()
                    ->getResult();
    }
    
}