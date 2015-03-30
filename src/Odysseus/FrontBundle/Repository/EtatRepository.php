<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EtatRepository extends EntityRepository
{
    
    public function getListeEtatpourProduit()
    {
        return $this->createQueryBuilder('e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'produit');
    }
    
    public function getIdEtatBanni()
    {
        $query = $this->createQueryBuilder('e')
                      ->select('e.idEtat')
                      ->where('e.type = :type')
                      ->setParameter('type', 'client')
                      ->andWhere('e.nom = :nom')
                      ->setParameter('nom', 'banni')
                      ->getQuery()
                      ->getSingleResult();
   
    }
    
    //select id
}