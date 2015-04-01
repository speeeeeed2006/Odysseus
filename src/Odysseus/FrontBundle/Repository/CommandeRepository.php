<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class CommandeRepository extends EntityRepository
{
    
    public function getCommandeEnAttentePaiement()
    {
        return $this->createQueryBuilder('c')
                    ->where('c.etat = :etat')
                    ->setParameter('etat', 'en attente paiement')
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCommandePayee()
    {
        return $this->createQueryBuilder('c')
                    ->where('c.etat = :etat')
                    ->setParameter('etat', 'payé')
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCommandeEnCoursdeLivraison()
    {
        return $this->createQueryBuilder('c')
                    ->where('c.etat = :etat')
                    ->setParameter('etat', 'en cours livraison')
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCommandeLivree()
    {
        return $this->createQueryBuilder('c')
                    ->where('c.etat = :etat')
                    ->setParameter('etat', 'livre')
                    ->getQuery()
                    ->getResult();
    }
    
}