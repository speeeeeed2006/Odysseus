<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AdresseRepository extends EntityRepository
{
    
    public function getAdresseFacturationClient($id, $offset)
    {
        return $this->createQueryBuilder('a')
                    ->where('a.type = :type')
                    ->setParameter('type', 0)
                    ->andWhere('a.id_client = :id')
                    ->setParameter('id', $id)
                    //->orderBy('a.idAdresse', 'DESC')
                    ->setFirstResult($offset)
                    ->getQuery();
    }
}