<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ImageSliderRepository extends EntityRepository
{
    
    public function getImageActive()
    {
        return $this->createQueryBuilder('i')
                    ->where('i.etat = :etat')
                    ->setParameter('etat', 'activée')
                    ->getQuery()
                    ->getResult();
    }
    
}
