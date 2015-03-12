<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EtatRepository extends EntityRepository
{
    
    public function getListeEtatpourProduit()
    {
        return $this
            ->createQueryBuilder('e')
            ->where('e.type = :param')
            ->setParameter('param', 'produit');
    }
}