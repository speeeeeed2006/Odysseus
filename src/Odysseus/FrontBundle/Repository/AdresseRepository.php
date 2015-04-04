<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Odysseus\FrontBundle\Entity\Adresse;

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
                    ->getSingleResult();
    }
    
    public function getListeAdresseLivraison($user)
    {   
        return $this->createQueryBuilder('a')
                    ->where('a.type = :type')
                    ->setParameter('type', 1)
                    ->andWhere('a.user = :user')
                    ->setParameter('user' , $user->getId()) 
                    ->getQuery()
                    ->getSingleResult();
    }

    public function getListeAdresse($user)
    {
        return $this->createQueryBuilder('a')
            ->where('a.user = :user')
            ->setParameter('user' , $user->getId())
            ->andWhere('a.etat = :etat')
            ->setParameter('etat' ,Adresse::VALIDE )
            ->getQuery()
            ->getResult();
    }
}