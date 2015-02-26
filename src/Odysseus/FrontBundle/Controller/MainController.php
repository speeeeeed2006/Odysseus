<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    
    public function menuAction()
    {   
        $repository = $this->getDoctrine()->getManager()->getRepository('OdysseusFrontBundle:Categorie');
        $categorie = $repository->findAll();  
        
        return $this->render('OdysseusFrontBundle:Default:menu.html.twig', array('liste_categories' => $categorie));
    }
    
    
    
    public function homeAction()
    {
        return $this->render('OdysseusFrontBundle:Main:home.html.twig');
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
