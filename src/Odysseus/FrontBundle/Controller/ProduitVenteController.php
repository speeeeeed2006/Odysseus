<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitVenteController extends Controller
{
    
    public function categorieAction($categorie)
    { 
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('OdysseusFrontBundle:ProduitVente')->getProduitbyCategorie($categorie);
         
        $categorie = $em->getRepository('OdysseusFrontBundle:Categorie')->find($categorie);
        
        return $this->render('OdysseusFrontBundle:ProduitVente:produits.html.twig',
                array('produits'  => $produits,
                      'categorie' => $categorie));
    }
    
    public function presentationAction($id)
    { 
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('OdysseusFrontBundle:ProduitVente')->find($id);
        
        $this->get('ladybug')->log($produit);
        
        return $this->render('OdysseusFrontBundle:ProduitVente:presentationProduit.html.twig', array('produit'  => $produit));
    }
    
    
}