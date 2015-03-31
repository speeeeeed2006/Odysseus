<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AdresseRepository extends EntityRepository
{ 

    public function getListeAdresseFacturation($id)
    {
        return $this->createQueryBuilder('a')
                    ->join('a.user', 'u') 
                    ->where('a.type = :type')
                    ->setParameter('type', 0)
                    ->andWhere('a.user' , $id)
                    ->getQuery()
                    ->getSingleResult();
    }
    
}