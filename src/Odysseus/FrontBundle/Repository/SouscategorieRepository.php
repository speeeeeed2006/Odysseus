<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SouscategorieRepository extends EntityRepository
{
    
    public function getListeSouscategorieparCategorie($id)
    {
        return $this->createQueryBuilder('s')
                    ->join('c', 'c.categorie_id = s.categorie_id')
                    ->where('s.categorie_id = :id')
                    ->setParameter('id', $id);
    }
}
