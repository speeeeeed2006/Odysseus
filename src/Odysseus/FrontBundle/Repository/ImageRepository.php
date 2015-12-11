<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Odysseus\FrontBundle\Entity\ProduitVente;

class ImageRepository extends EntityRepository
{
    
    public function getImageActive()
    {
        return $this->createQueryBuilder('i')
                    ->where('i.etat = :etat')
                    ->setParameter('etat', 'activée')
                    ->getQuery()
                    ->getResult();
    }

    public function getImageProduit(ProduitVente $produitVente)
    {
        return $this->createQueryBuilder('i')
            ->where('i.etat = :etat')
            ->setParameter('etat', 'activée')
            ->andWhere('i.produitVente = :produitVente')
            ->setParameter('produitVente', $produitVente->getIdProduitVente())
            ->getQuery()
            ->getResult();
    }
    
}
