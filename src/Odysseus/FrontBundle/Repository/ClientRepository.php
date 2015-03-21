<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ClientRepository extends EntityRepository
{
    
//    public function isBanni($id)
//    {
//        return $this->createQueryBuilder('c')
//                    ->join('c.etat', 'e')
//                    ->where('e.type = :type')
//                    ->setParameter('type', 'client')
//                    ->andWhere('e.nom = :nom')
//                    ->setParameter('nom', 'banni')
//                    ->andWhere('c.user_id = :id')
//                    ->setParameter('id', $id)
//                    ->getQuery();
//    }
}