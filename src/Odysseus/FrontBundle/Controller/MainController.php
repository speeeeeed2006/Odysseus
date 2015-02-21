<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
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
