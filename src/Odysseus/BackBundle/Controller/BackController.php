<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackController extends Controller
{
    
    public function indexAction(){
        return $this->render('OdysseusBackBundle:Home:index.html.twig');
    }
    
    
    public function afficherNbProdAValiderAction()
    { 
        $nb = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('OdysseusFrontBundle:Produit')
                   ->getCountProduitAValider();
        
        return $this->render('OdysseusBackBundle:Produit:bulle.html.twig', array(
            'nb' => $nb,
            ));
    }
    
    public function afficherNbProdVenteAValiderAction()
    { 
        $nb = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('OdysseusFrontBundle:ProduitVente')
                   ->getCountProduitVenteAValider();
        
        return $this->render('OdysseusBackBundle:Produit:bulle.html.twig', array(
            'nb' => $nb,
            ));
    }

}
