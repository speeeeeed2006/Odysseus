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
    

    public function commandeValiderPayeeAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $commande = $em->getRepository('OdysseusFrontBundle:Commande')
                      ->find($id);
        
        if (!$commande) {
            throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
        }
        
        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        $commande->setEtat($etat->find('10'));
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('commande', 'La commande est passée "payée"');

        return $this->redirect($this->generateUrl('odysseus_back_lister_commande_payee'/*, array('page' => 1)*/));       
    }
    

    
    public function commandePayeeAction()
    {
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandePayee();
        
        //$this->get('ladybug')->log($listeCommandes);
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandePayee.html.twig',
        	array('liste_commandes' => $listeCommandes)
        );
    }
    
    public function commandeValiderEnCoursLivraisonAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $commande = $em->getRepository('OdysseusFrontBundle:Commande')
                      ->find($id);
        
        if (!$commande) {
            throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
        }
        
        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        $commande->setEtat($etat->find('11'));
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('commande', 'La commande est passée "en cours de livraison"');

        return $this->redirect($this->generateUrl('odysseus_back_lister_commande_en_cours_livraison'/*, array('page' => 1)*/));       
    }
    
    public function commandeEnCoursDeLivraisonAction()
    {
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandeEnCoursDeLivraison();
        
        //$this->get('ladybug')->log($listeCommandes);
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandeEnCoursDeLivraison.html.twig',
        	array('liste_commandes' => $listeCommandes)
        );
    }
    
    public function commandeValiderLivreAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $commande = $em->getRepository('OdysseusFrontBundle:Commande')
                      ->find($id);
        
        if (!$commande) {
            throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
        }
        
        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        $commande->setEtat($etat->find('12'));
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('commande', 'La commande est passée "livrée"');

        return $this->redirect($this->generateUrl('odysseus_back_lister_commande_livree'/*, array('page' => 1)*/));       
    }
    
    public function commandeLivreeAction()
    {
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandeLivree();
        
        //$this->get('ladybug')->log($listeCommandes);
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandeLivree.html.twig',
        	array('liste_commandes' => $listeCommandes)
        );
    }
    
    
    
}