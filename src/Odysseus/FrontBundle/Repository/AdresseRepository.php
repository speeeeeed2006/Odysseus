<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AdresseRepository extends EntityRepository
{ 

    public function getListeAdresseFacturation($user)
    {   
        return $this->createQueryBuilder('a')
                    ->where('a.type = :type')
                    ->setParameter('type', 0)
                    ->andWhere('a.user = :user')
                    ->setParameter('user' , $user->getId()) 
                    ->getQuery()
                    ->getResult();
    }
    
}