<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Commande;


class CommandeController extends Controller
{
    public function commandeEnAttenteAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandeEnAttentePaiement();   

        $listeCommandesAdresse = array();
        
        foreach($listeCommandes as $commande){  
            $adresseF = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($commande->getUser());     
            //$adresseL = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseLivraison($commande->getUser());
            
            array_push($listeCommandesAdresse, array('commande'=> $commande,
                                                     'adresseF' => $adresseF,
                                                     //'adresseL' => $adresseL
                ));  
        }
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandeEnAttente.html.twig',
                array('liste_commandes' => $listeCommandesAdresse)
        );
    }
    

    public function commandeValiderPayeeAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $commande = $em->getRepository('OdysseusFrontBundle:Commande')->find($id);
        
        if (!$commande) {
            throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
        }
        
        $commande->setEtat(Commande::PAYE);
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('commande', 'La commande est passée "payée"');

        return $this->redirect($this->generateUrl('odysseus_back_lister_commande_payee'));       
    }
    

    
    public function commandePayeeAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandePayee();
        
        $listeCommandesAdresse = array();
        
        foreach($listeCommandes as $commande){  
            $adresseF = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($commande->getUser());     
            array_push($listeCommandesAdresse, array('commande'=> $commande,'adresseF' => $adresseF));  
        }
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandePayee.html.twig',
        	array('liste_commandes' => $listeCommandesAdresse)
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
        
        $commande->setEtat(Commande::EN_LIVRAISON);
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('commande', 'La commande est passée "en cours de livraison"');

        return $this->redirect($this->generateUrl('odysseus_back_lister_commande_en_cours_livraison'));       
    }
    
    public function commandeEnCoursDeLivraisonAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandeEnCoursDeLivraison();
        
        $listeCommandesAdresse = array();
        
        foreach($listeCommandes as $commande){  
            $adresseF = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($commande->getUser());     
            array_push($listeCommandesAdresse, array('commande'=> $commande,'adresseF' => $adresseF));  
        }
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandeEnCoursDeLivraison.html.twig',
        	array('liste_commandes' => $listeCommandesAdresse)
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
        
        $commande->setEtat(Commande::LIVRE);
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('commande', 'La commande est passée "livrée"');

        return $this->redirect($this->generateUrl('odysseus_back_lister_commande_livree'));       
    }
    
    public function commandeLivreeAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeCommandes =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Commande')
                                 ->getCommandeLivree();
         
        $listeCommandesAdresse = array();
        
        foreach($listeCommandes as $commande){  
            $adresseF = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($commande->getUser());     
            array_push($listeCommandesAdresse, array('commande'=> $commande,'adresseF' => $adresseF));  
        }
        
        return $this->render('OdysseusBackBundle:Commande:listerCommandeLivree.html.twig',
        	array('liste_commandes' => $listeCommandesAdresse)
        );
    }
    
    
    
}