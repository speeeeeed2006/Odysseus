<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanierController extends Controller
{
    
    public function panierAction()
    {
        return $this->render('OdysseusFrontBundle:Panier:panier.html.twig');    
    }
    
    
    public function livraisonAction()
    {
        return $this->render('OdysseusFrontBundle:Panier:livraison.html.twig');    
    }
    
    public function fraisAction()
    {
        return $this->render('OdysseusFrontBundle:Panier:frais.html.twig');    
    }
    
    public function payerAction()
    {
        return $this->render('OdysseusFrontBundle:Panier:frais.html.twig');    
    }
    
}