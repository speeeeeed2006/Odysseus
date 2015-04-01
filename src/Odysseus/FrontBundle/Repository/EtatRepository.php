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
    
    public function getEtatValide()
    {
        return $this->createQueryBuilder('e')  
                    ->where('e.type = :type')
                    ->setParameter('type', 'produit')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'valide')
                    ->getQuery()
                    ->getSingleResult();             
    }
    
    public function getEtatBanni()
    {
        return $this->createQueryBuilder('e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'client')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'banni')
                    ->getQuery()
                    ->getSingleResult();
    }
    
    public function getEtatActive()
    {
        return $this->createQueryBuilder('e')  
                    ->where('e.type = :type')
                    ->setParameter('type', 'image')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'active')
                    ->getQuery()
                    ->getSingleResult();             
    }
    
    public function getEtatDesactive()
    {
        return $this->createQueryBuilder('e')  
                    ->where('e.type = :type')
                    ->setParameter('type', 'image')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'desactive')
                    ->getQuery()
                    ->getSingleResult();             
    }
    
}