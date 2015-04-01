<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Odysseus\FrontBundle\Form\RechercheType;

class ProduitVenteController extends Controller
{
    
    public function categorieAction($categorie)
    { 
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('OdysseusFrontBundle:ProduitVente')->getProduitValidebyCategorie($categorie);
         
        $categorie = $em->getRepository('OdysseusFrontBundle:Categorie')->find($categorie);
        
        return $this->render('OdysseusFrontBundle:ProduitVente:produits.html.twig',
                array('produits'  => $produits,
                      'categorie' => $categorie));
    }
    
    public function presentationAction($id)
    { 
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('OdysseusFrontBundle:ProduitVente')->find($id);
        
        
        return $this->render('OdysseusFrontBundle:ProduitVente:presentationProduit.html.twig', array('produit'  => $produit));
    }
    
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
            //echo $form['recherche']->getData();
            $em = $this->getDoctrine()->getManager();
            $listeProduits = $em->getRepository('OdysseusFrontBundle:ProduitVente')->recherche($form['recherche']->getData());
        }
        
        //ladybug_dump_die($produits);              
        return $this->render('OdysseusFrontBundle:ProduitVente:produitsRecherche.html.twig', array('liste_produits'  => $listeProduits));
    }
    
}