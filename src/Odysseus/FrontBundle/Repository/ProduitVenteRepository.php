<?php 
namespace Odysseus\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Odysseus\FrontBundle\Entity\ProduitVente;

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
                    //->where('pv.etat = :etat')
                    //->setParameter('etat', 'valide')
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
     
    public function getProduitVenteCategorieALaUne()
    {
         return $this->createQueryBuilder('pv')
                     //->join('pv.idProduit', 'p')
                     ->where('pv.alaune = 1')
                     ->getQuery()
                     ->getResult();  
     }
     
    public function getProduitVenteNouveauteALaUne()
    {
         return $this->createQueryBuilder('pv')
                     ->where('pv.nouveaute = 1')
                     ->getQuery()
                     ->getSingleResult();  
    }
     
    //récupère les produits en session panier
    public function findArray($array)
    {
         return $this->createQueryBuilder('pv')
                     ->select('pv')
                     ->where('pv.idProduitVente IN (:array)')
                     ->setParameter('array', $array)
                     ->getQuery()
                     ->getResult();  
     }
     
    public function getProduitVenteDerniersAjoutes()
    {
         return $this->createQueryBuilder('pv')
                     ->orderBy('pv.dateAjout', 'DESC')
                     ->setMaxResults(3)
                     ->getQuery()
                     ->getResult();  
    }
    
    //Fonctions du profile

    public function getUserProduitVente($user)
    {
        return $this->createQueryBuilder('p')
            ->where('p.etat <> :etat')
            ->setParameter('etat',ProduitVente::DESACTIVE)
            ->andWhere('p.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function getUserProduitVenteRefuser($user)
    {
        return $this->createQueryBuilder('p')
            ->where('p.etat = :etat')
            ->setParameter('etat',ProduitVente::REFUSE)
            ->andWhere('p.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function getUserProduitVenteAttente($user)
    {
        return $this->createQueryBuilder('p')
            ->where('p.etat = :etat')
            ->setParameter('etat',ProduitVente::A_VALIDER)
            ->andWhere('p.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function getUserProduitVenteEnVente($user)
    {
        return $this->createQueryBuilder('p')
            ->where('p.etat = :etat')
            ->setParameter('etat',ProduitVente::VALIDE)
            ->andWhere('p.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
}
