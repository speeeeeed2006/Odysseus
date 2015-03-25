<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ProduitVenteRepository extends EntityRepository
{
    
    public function getListeProduitVenteAValider($nombreParPage, $page)
    {
        if ($page < 1) {
            throw new \InvalidArgumentException('L\'argument $page ne peut être inférieur à 1 (valeur : "'.$page.'").');
        }
        
        $query = $this->createQueryBuilder('p')
                      ->join('p.etat', 'e')
                      ->where('e.type = :type')
                      ->setParameter('type', 'produit')
                      ->andWhere('e.nom = :nom')
                      ->setParameter('nom', 'a_valider')
                      ->getQuery();
    
        // On définit le produit à partir duquel commencer la liste et le nb par page
        $query->setFirstResult(($page-1) * $nombreParPage)
              ->setMaxResults($nombreParPage);
        // Enfin, on retourne l'objet Paginator correspondant à la requête construite
        return new Paginator($query);
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
    
    public function getListeProduitVente($nombreParPage, $page)
    {
        if ($page < 1) {
            throw new \InvalidArgumentException('L\'argument $page ne peut être inférieur à 1 (valeur : "'.$page.'").');
        }
        
        $query = $this->createQueryBuilder('p')
                      ->getQuery();
    
        // On définit le produit à partir duquel commencer la liste et le nb par page
        $query->setFirstResult(($page-1) * $nombreParPage)
              ->setMaxResults($nombreParPage);
        // Enfin, on retourne l'objet Paginator correspondant à la requête construite
        return new Paginator($query);
    }
    
     public function getProduitValidebyCategorie($categorie)
    {
        return $this->createQueryBuilder('pv')
                    //->select('pv')
                    ->join('pv.produit', 'p')
                    ->where('p.categorie = :categorie')
                    ->setParameter('categorie', $categorie)
                    ->where('p.etat = :etat')
                    ->setParameter('etat', 'valide')
                    ->orderBy('p.idProduit')
                    ->getQuery()
                    ->getResult();
    }
}
