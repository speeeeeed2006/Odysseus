<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Odysseus\FrontBundle\Form\AdressePanierType;
use Odysseus\FrontBundle\Entity\Adresse;
use Odysseus\UserBundle\Entity\User;

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
       
        //user = vendeur
        $user = array();
        foreach($produits as $produit){
            $id = $em->getRepository('OdysseusUserBundle:User')->find($produit->getUser());
            $vendeur = $em->getRepository('OdysseusUserBundle:User')->find($id);
            array_push($user, array('vendeur'=> $vendeur));
            
        }
        
       // $this->get('ladybug')->log($listeProduits);
        
        return $this->render('OdysseusFrontBundle:Panier:panier.html.twig', array('user'=> $user,
                                                                                  'produits'=> $produits,
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
        
        return $this->render('OdysseusFrontBundle:Default:panierHeader.html.twig', array('nbArticle'=> $nbArticle));
    }
    
    
    public function livraisonAction()
    {
        //on recupère le user connecté
        $user = $this->container->get('security.context')->getToken()->getUser();
              
        $adresse = new Adresse();
        $form = $this->createForm(new AdressePanierType(), $adresse);
        
        $em = $this->getDoctrine()->getManager();
        
        $adressesLivraison = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseLivraison($user);             
        $adressesFacturation = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($user);
        
        //validation bouton Ajouter
        if($this->get('request')->getMethod() == 'POST'){
            
            $form->handleRequest($this->getRequest());
            
            if($form->isValid()){
                
                $adresse->setUser($user);
                $adresse->setEtat(Adresse::VALIDE);
                
                $em->persist($adresse);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('livraison_haut', 'Adresse bien ajoutée');
                return $this->redirect($this->generateUrl('odysseus_front_livraison'));           
            }
        }
        
        return $this->render('OdysseusFrontBundle:Panier:livraison.html.twig',
                array('form' => $form->createView(),
                      'adresses_livraison' => $adressesLivraison,
                      'adresses_facturation' => $adressesFacturation));    
    }
    
    public function livraisonAdresseObsoleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
       
        $adresse = $em->getRepository('OdysseusFrontBundle:Adresse')->setAdresseObsolete($id);
        
        $this->get('session')->getFlashBag()->add('livraison_haut', 'Adresse bien supprimée');
        return $this->redirect($this->generateUrl('odysseus_front_livraison'));    
    }
    
    public function setLivraisonSession()
    {
        $session = $this->getRequest()->getSession();
        
        if(!$session->has('adresse')) $session->set('adresse', array()); 
        $adresse = $session->get('adresse'); 
       
        if($this->getRequest()->request->get('livraison') != null && $this->getRequest()->request->get('facturation') != null){
            
            $adresse['livraison'] = $this->getRequest()->request->get('livraison');
            $adresse['facturation'] = $this->getRequest()->request->get('facturation');
            
         } else {
            
            return $this->redirect($this->generateUrl('odysseus_front_livraison'));
        } 
        
        $session->set('adresse', $adresse);
       
        return $this->redirect($this->generateUrl('odysseus_front_validation_panier'));
        
    }
    
    
    public function validationAction()
    {
        if($this->getRequest()->getMethod() == 'POST') {
            
            if($this->getRequest()->request->get('livraison') == null) {   
                $this->get('session')->getFlashBag()->add('livraison', 'Une adresse de livraison est obligatoire');
                return $this->redirect($this->generateUrl('odysseus_front_livraison'));
            }
            
            if($this->getRequest()->request->get('facturation') == null) {   
                $this->get('session')->getFlashBag()->add('livraison', 'Une adresse de facturation est obligatoire');
                return $this->redirect($this->generateUrl('odysseus_front_livraison'));
            }
            
            $this->setLivraisonSession();
        }
       
       
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        //on recupère les adresses en session
        $adresse = $session->get('adresse');
                
        //les produits du panier
        $produits = $em->getRepository('OdysseusFrontBundle:ProduitVente')->findArray(array_keys($session->get('panier')));
        
        //vendeur
        $user = array();
        foreach($produits as $produit){
            $id = $em->getRepository('OdysseusUserBundle:User')->find($produit->getUser());
            $vendeur = $em->getRepository('OdysseusUserBundle:User')->find($id);
            array_push($user, array('vendeur'=> $vendeur));
            
        }
        
        $livraison = $em->getRepository('OdysseusFrontBundle:Adresse')->find($adresse['livraison']);
        $facturation = $em->getRepository('OdysseusFrontBundle:Adresse')->find($adresse['facturation']);

        return $this->render('OdysseusFrontBundle:Panier:validation.html.twig',
                array('user'                => $user,
                      'produits'            => $produits,
                      'adresse_livraison'   => $livraison,
                      'adresse_facturation' => $facturation,
                      'panier'              => $session->get('panier')));    
    }
    
    
    public function payerAction()
    {
        return $this->render('OdysseusFrontBundle:Panier:frais.html.twig');    
    }
    
}