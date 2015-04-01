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
                      ->where('p.etat = :etat')
                      ->setParameter('etat', 'à valider')
                      ->getQuery();
    
        // On définit le produit à partir duquel commencer la liste et le nb par page
        $query->setFirstResult(($page-1) * $nombreParPage)
              ->setMaxResults($nombreParPage);
        // Enfin, on retourne l'objet Paginator correspondant à la requête construite
        return new Paginator($query);
    }
    
    public function getListeProduitVenteRefuse($nombreParPage, $page)
    {
        if ($page < 1) {
            throw new \InvalidArgumentException('L\'argument $page ne peut être inférieur à 1 (valeur : "'.$page.'").');
        }
        
        $query = $this->createQueryBuilder('p')
                      ->where('p.etat = :etat')
                      ->setParameter('etat', 'refusé')
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
                    ->where('p.etat = :etat')
                    ->setParameter('etat', 'à valider')
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
                    ->select('pv')
                    ->where('pv.etat = :etat')
                    ->setParameter('etat', 'valide')
                    ->join('pv.produit', 'p')
                    ->andWhere('p.categorie = :categorie')
                    ->setParameter('categorie', $categorie) 
                    ->orderBy('pv.idProduitVente')
                    ->getQuery()
                    ->getResult();
    }
    
    public function recherche($chaine)
    {
         return $this->createQueryBuilder('pv')
                     ->select('pv')
                     ->join('pv.produit', 'p')
                     ->where('p.nom like :chaine')
                     ->orWhere('p.marque like :chaine')
                     ->orWhere('p.description like :chaine')
                     ->orderBy('pv.idProduitVente')
                     ->setParameter('chaine', $chaine)
                     ->getQuery()
                     ->getResult();  
     }
}
