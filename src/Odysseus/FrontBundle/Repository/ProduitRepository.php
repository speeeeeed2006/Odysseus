<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Odysseus\FrontBundle\Entity\Produit;

class ProduitRepository extends EntityRepository
{
    //requete ok
    // On ajoute deux arguments : le nombre de produits par page, ainsi que la page courante
    public function getListeProduitAValider($nombreParPage, $page)
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
    
    
    public function getCountProduitAValider()
    {
        return $this->createQueryBuilder('p')
                    ->select('COUNT(p)')
                    ->where('p.etat = :etat')
                    ->setParameter('etat', 'à valider')
                    ->getQuery()
                    ->getSingleResult();
    }
    
    
    public function getListeProduit($nombreParPage, $page)
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
    
    
    public function getListeProduitRefuse($nombreParPage, $page)
    {
        if ($page < 1) {
            throw new \InvalidArgumentException('L\'argument $page ne peut être inférieur à 1 (valeur : "'.$page.'").');
        }
        
        $query = $this->createQueryBuilder('p')
                      ->where('p.etat = :etat')
                      ->setParameter('etat', 'refuse')
                      ->getQuery();
    
        // On définit le produit à partir duquel commencer la liste et le nb par page
        $query->setFirstResult(($page-1) * $nombreParPage)
              ->setMaxResults($nombreParPage);
        // Enfin, on retourne l'objet Paginator correspondant à la requête construite
        return new Paginator($query);
    }

    //Front

    public function getProduitAjaxRechercheMarque($categorie, $sousCategorie)
    {
        $query = $this->createQueryBuilder('p')
            ->where('p.etat = :etat')
            ->setParameter('etat', Produit::VALIDE )
            ->andWhere('p.categorie = :categorie_id')
            ->setParameter('categorie_id', $categorie)
            ->andWhere('p.sousCategorie = :sous_categorie_id')
            ->setParameter('sous_categorie_id', $sousCategorie)
            ->getQuery()
            ->getResult();

        return $query;
    }

    public function getProduitAjaxRecherche($categorie, $sousCategorie, $marque)
    {
        if($marque == ""){
            $query = $this->createQueryBuilder('p')
                ->where('p.etat = :etat')
                ->setParameter('etat', Produit::VALIDE )
                ->andWhere('p.categorie = :categorie_id')
                ->setParameter('categorie_id', $categorie)
                ->andWhere('p.sousCategorie = :sous_categorie_id')
                ->setParameter('sous_categorie_id', $sousCategorie)
                ->getQuery()
                ->getResult();
        }
        else {
            $query = $this->createQueryBuilder('p')
                ->where('p.etat = :etat')
                ->setParameter('etat', Produit::VALIDE)
                ->andWhere('p.categorie = :categorie_id')
                ->setParameter('categorie_id', $categorie)
                ->andWhere('p.sousCategorie = :sous_categorie_id')
                ->setParameter('sous_categorie_id', $sousCategorie)
                ->andWhere('p.marque = :marque')
                ->setParameter('marque', $marque)
                ->getQuery()
                ->getResult();
        }
        return $query;
    }
}
