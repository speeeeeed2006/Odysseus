<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ImageSliderRepository extends EntityRepository
{

//    public function isImageActive($image)
//    {
//        return (boolean)$this->createQueryBuilder('i')
//                            ->select('COUNT(i)')
//                            ->join('i.etat', 'e')
//                            ->where('e.type = :type')
//                            ->setParameter('type', 'image')
//                            ->andWhere('e.nom = :nom')
//                            ->setParameter('nom', 'active')
//                            ->andWhere('i.idImageSlider', $image->getIdImageSlider())
//                            ->getQuery()
//                            ->getSingleResult();
//
//    }
    
    public function getImageActive()
    {
        return $this->createQueryBuilder('i')
                    ->select('i')
                    ->join('i.etat', 'e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'image')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'active')
                    ->getQuery()
                    ->getResult();
    }
    
}
