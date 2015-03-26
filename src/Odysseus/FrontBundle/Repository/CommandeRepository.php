<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class CommandeRepository extends EntityRepository
{
    
    public function getCommandeEnAttentePaiement()
    {
        return $this->createQueryBuilder('c')
                    ->join('c.etat', 'e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'commande')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'en_attente_paiement')
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCommandePayee()
    {
        return $this->createQueryBuilder('c')
                    ->join('c.etat', 'e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'commande')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'paye')
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCommandeEnCoursdeLivraison()
    {
        return $this->createQueryBuilder('c')
                    ->join('c.etat', 'e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'commande')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'en_cours_livraison')
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCommandeLivree()
    {
        return $this->createQueryBuilder('c')
                    ->join('c.etat', 'e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'commande')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'livre')
                    ->getQuery()
                    ->getResult();
    }
}