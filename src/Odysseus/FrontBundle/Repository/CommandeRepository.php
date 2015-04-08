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
                    ->setParameter('etat', 'payée')
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCommandeEnCoursdeLivraison()
    {
        return $this->createQueryBuilder('c')
                    ->where('c.etat = :etat')
                    ->setParameter('etat', 'en livraison')
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCommandeLivree()
    {
        return $this->createQueryBuilder('c')
                    ->where('c.etat = :etat')
                    ->setParameter('etat', 'livrée')
                    ->getQuery()
                    ->getResult();
    }
    
    
    public function getClientCommande($commande)
    {   
        return $this->createQueryBuilder('c')
                    ->join('c.user', 'u')
                    ->addSelect('u')
                    ->where('c.idCommande = :commande' )
                    ->setParameter('commande' , $commande) 
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCommandeOfClient($user)
    {   
        return $this->createQueryBuilder('c')
                    ->join('c.user', 'u')
                    ->where('c.user = :user' )
                    ->setParameter('user' , $user->getId())
                    ->getQuery()
                    ->getResult();
    }
    
}