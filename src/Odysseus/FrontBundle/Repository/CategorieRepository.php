<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CategorieRepository extends EntityRepository
{ 

    public function getCategorieALaUne()
    {   
        return $this->createQueryBuilder('c')
                    ->where('c.alaune = 1') 
                    ->getQuery()
                    ->getSingleResult();
    }
    
}