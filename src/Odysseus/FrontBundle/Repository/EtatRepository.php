<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EtatRepository extends EntityRepository
{
    
    public function getListeEtatpourProduitCat()
    {
        return $this->createQueryBuilder('e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'produit');
    }
}