<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Commande;


class CommandeController extends Controller
{
    public function commandeEnAttenteAction()
    {
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandeEnAttentePaiement();
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandeEnAttente.html.twig',
        	array('liste_commandes' => $listeCommandes)
        );
    }
    
    /* A FAIRE
     * public function commandeAEtePayee()
    {
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandeEnAttentePaiement();
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandePayee.html.twig',
        	array('liste_commandes' => $listeCommandes)
        );
    }*/
    
    public function commandePayee()
    {
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandePayee();
        
        $this->get('ladybug')->log($listeCommandes);
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandePayee.html.twig',
        	array('liste_commandes' => $listeCommandes)
        );
    }
    
    public function commandeEnCoursDeLivraison()
    {
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandeEnCoursDeLivraison();
        
        $this->get('ladybug')->log($listeCommandes);
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandeEnCoursDeLivraison.html.twig',
        	array('liste_commandes' => $listeCommandes)
        );
    }
    
    public function commandeLivree()
    {
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandeLivree();
        
        $this->get('ladybug')->log($listeCommandes);
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandeLivree.html.twig',
        	array('liste_commandes' => $listeCommandes)
        );
    }
    
    
    
}