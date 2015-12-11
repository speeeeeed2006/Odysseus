<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Odysseus\FrontBundle\Form\RechercheType;

class ProduitVenteController extends Controller
{
    
    public function categorieAction($categorie)
    { 
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
          
        $produits = $em->getRepository('OdysseusFrontBundle:ProduitVente')->getProduitValidebyCategorie($categorie);        
        $categorie = $em->getRepository('OdysseusFrontBundle:Categorie')->find($categorie);
        
        if($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;
        
        return $this->render('OdysseusFrontBundle:ProduitVente:produits.html.twig',
                array('produits'  => $produits,
                      'categorie' => $categorie,
                      'panier'    => $panier));
    }
    
    public function presentationAction($id)
    { 
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        
        $produit = $em->getRepository('OdysseusFrontBundle:ProduitVente')->find($id);
        
        if(!$produit) throw $this->createNotFoundException('La page demandée n\'existe pas.');
        
        if($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;
        
        return $this->render('OdysseusFrontBundle:ProduitVente:presentationProduit.html.twig', array('produit'  => $produit,
                                                                                                     'panier'    => $panier));
    }
    
    //pour le form de recherche
    public function rechercheAction()
    { 
        $form = $this->createForm(new RechercheType());
        
        return $this->render('OdysseusFrontBundle:Default:recherche.html.twig', array('form' => $form->createView()));  
    }
    
    
    public function rechercheTraitementAction()
    { 
        $form = $this->createForm(new RechercheType());

        if ($this->get('request')->getMethod() == 'POST'){
            
            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $listeProduits = $em->getRepository('OdysseusFrontBundle:ProduitVente')->recherche($form['recherche']->getData());
        
            $recherche = $form['recherche']->getData();  
        }
        
                     
        return $this->render('OdysseusFrontBundle:ProduitVente:produitsRecherche.html.twig',
                array('liste_produits'  => $listeProduits,
                      'recherche'       => $recherche
                    ));
    }
    
}