<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProduitVenteRepository extends EntityRepository
{
    //requete ok
    public function getListeProduitVenteAValider()
    {
        return $this->createQueryBuilder('p')
                    ->join('p.etat', 'e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'produit')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'a_valider')
                    ->getQuery()
                    ->getResult();
    }
    
    public function getCountProduitVenteAValider()
    {
        return $this->createQueryBuilder('p')
                    ->select('COUNT(p)')
                    ->join('p.etat', 'e')
                    ->where('e.type = :type')
                    ->setParameter('type', 'produit')
                    ->andWhere('e.nom = :nom')
                    ->setParameter('nom', 'a_valider')
                    ->getQuery()
                    ->getSingleResult();
    }
}
