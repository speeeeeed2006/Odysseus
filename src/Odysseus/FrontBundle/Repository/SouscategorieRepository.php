<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SouscategorieRepository extends EntityRepository
{
    
    public function getSousCategorie($id)
    {   
        return $this->createQueryBuilder('sc')
                    ->where('sc.idCategorie = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getResult();
    }
}
