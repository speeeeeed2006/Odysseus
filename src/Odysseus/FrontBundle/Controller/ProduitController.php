<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{
    
    public function produitAction()
    {
       return $this->render('OdysseusFrontBundle:Produit:produit.html.twig'); 
        
    }
    
    public function presentationAction()
    { 
       return $this->render('OdysseusFrontBundle:Produit:presentationProduit.html.twig');
    }
}