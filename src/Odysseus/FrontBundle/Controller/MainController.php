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
    
    
    //revoir la function pour récupéerer le user + adresse
    public function choisirCategorieAction()
    {
//        $em = $this->getDoctrine()->getManager();
//        
//        $listeCategories = $em->getRepository('OdysseusFrontBundle:Categorie');
//     
//        return $this->render('OdysseusBackBundle:Home:choisircategorie.html.twig',
//        	array('liste_categories' => $listeCategories  
//                    )
//        );
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
    
    
//    public function produitAction()
//    {
//        return $this->render('OdysseusFrontBundle:Main:produit.html.twig');
//    }
    
    
    public function panierAction()
    {
        return $this->render('OdysseusFrontBundle:Main:panier.html.twig');
    }
    
}
