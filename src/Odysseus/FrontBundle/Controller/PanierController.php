<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;


class PanierController extends Controller
{
    
    public function panierAction()
    {
        //on crée la variable de session panier
        $session = $this->getRequest()->getSession();
        
        
        if(!$session->has('panier'))
            $session->set('panier', array());
        
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('OdysseusFrontBundle:ProduitVente')->findArray(array_keys($session->get('panier')));
        
        return $this->render('OdysseusFrontBundle:Panier:panier.html.twig', array('produits'=> $produits,
                                                                                  'panier' => $session->get('panier')));    
    }
    
    public function ajouterAction($id)
    {
        $session = $this->getRequest()->getSession();
        
        //on déclare notre variable de session panier
        if(!$session->has('panier'))
            $session->set('panier', array());
        $panier = $session->get('panier');
        
        //panier[id du produit] => quantité - si le produit est déjà dans le panier, +1 dans la quantité
        if(array_key_exists($id, $panier)){
            
            if($this->getRequest()->query->get('qte') != null)
                $panier[$id] = $this->getRequest ()->query->get ('qte');
                $this->get('session')->getFlashBag()->add('panier', 'Quantité de l\'article modifiée avec succès');
            
        } else { //s'il n'existe pas déjà dans le panier
            
            if($this->getRequest()->query->get('qte') != null)
                $panier[$id] = $this->getRequest ()->query->get ('qte');
            else
                $panier[$id] = 1 ;
           
            $this->get('session')->getFlashBag()->add('panier', 'Article ajouté avec succès au panier');
        }
        
        //on met à jour notre variable de session
        $session->set('panier', $panier);
        
        
        return $this->redirect($this->generateUrl('odysseus_front_panier'));    
    }
    
    public function supprimerAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        
        if(array_key_exists($id, $panier)){
            unset($panier[$id]);
            $session->set('panier', $panier);
            $this->get('session')->getFlashBag()->add('panier', 'Article supprimé avec succès du panier');
        }
        
        return $this->redirect($this->generateUrl('odysseus_front_panier'));  
        
    }
    
    public function afficherNombreArticlePanierAction()
    {
        $session = $this->getRequest()->getSession();
        if(!$session->has('panier'))
            $nbArticle = 0;
        else 
            $nbArticle = count($session->get('panier'));
        
        //ladybug_dump($nbArticle);
       
        
        return $this->render('OdysseusFrontBundle:Default:panierHeader.html.twig', array('nbArticle'=> $nbArticle));
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