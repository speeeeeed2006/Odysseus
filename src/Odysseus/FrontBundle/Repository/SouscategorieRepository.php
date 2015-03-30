<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SouscategorieRepository extends EntityRepository
{
    
    public function getListeSouscategorieparCategorie($id)
    {
        return $this->createQueryBuilder('s')
                    ->join('s.categorie', 'c')
                    ->where('s.categorie = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getResult();
    }
}
