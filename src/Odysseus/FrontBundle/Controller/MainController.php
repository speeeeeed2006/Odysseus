<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homeAction()
    {
        return $this->render('OdysseusFrontBundle:Main:home.html.twig');
    }
    
    public function menuAction()
    {   
        $categories = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('OdysseusFrontBundle:Categorie')
                           ->findAll();  
        
        return $this->render('OdysseusFrontBundle:Default:menu.html.twig', array('liste_categories' => $categories));
    }
    
    public function menuSidebarAction()
    {   
        $em = $this->getDoctrine()->getManager();
        
        $categories = $em->getRepository('OdysseusFrontBundle:Categorie')
                         ->findAll(); 
        
        $sousCategories = $em->getRepository('OdysseusFrontBundle:Souscategorie')
                                 ->findAll(); 

        foreach($categories as $categorie){         
              
        } 
        
        return $this->render('OdysseusFrontBundle:Default:menusidebar.html.twig', array(
            'liste_categories' => $categories,
            'liste_sous_categories' => $sousCategories,
            ));
    }
    
    public function afficherSliderAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeImagesSlider = $em->getRepository('OdysseusFrontBundle:ImageSlider')
                                ->getImageActive();
        
        return $this->render('OdysseusFrontBundle:Default:slider.html.twig',
        	array('liste_imagesSlider' => $listeImagesSlider )
        );
        
    }
    
    public function afficherNouveauteAction()
    {
        $em = $this->getDoctrine()->getManager();
       
        $nouveaute = $em->getRepository('OdysseusFrontBundle:ProduitVente')
                        ->getProduitVenteNouveauteALaUne();
        
        return $this->render('OdysseusFrontBundle:Default:nouveaute.html.twig',
        	array('nouveaute' => $nouveaute) 
        );
        
    }
    
    public function afficherProduitCategorieAction()
    {
        $em = $this->getDoctrine()->getManager();
       
        $listeProduits = $em->getRepository('OdysseusFrontBundle:ProduitVente')
                            ->getProduitVenteCategorieALaUne();
        
        $categorieALaUne = $em->getRepository('OdysseusFrontBundle:Categorie')
                              ->getCategorieALaUne();
        
        return $this->render('OdysseusFrontBundle:Default:produitCategorieHome.html.twig',
        	array('liste_produits' => $listeProduits,
                      'categorie' => $categorieALaUne ) 
        );
        
    }
     
    public function panierAction()
    {
        return $this->render('OdysseusFrontBundle:Main:panier.html.twig');
    }
    
    public function afficherMenuCategoriesFooterAction(){
        
        $categories = $this->getDoctrine()->getManager()
                           ->getRepository('OdysseusFrontBundle:Categorie')
                           ->findAll(); 
        
        $nouveautes = $this->getDoctrine()->getManager()
                           ->getRepository('OdysseusFrontBundle:ProduitVente')
                           ->getProduitVenteDerniersAjoutes();
        
        return $this->render('OdysseusFrontBundle:Default:menuProduitsFooter.html.twig',
                array('liste_categories' => $categories,
                      'liste_nouveautes' => $nouveautes));
        
    }
    
}
