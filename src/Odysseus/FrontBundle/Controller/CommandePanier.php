<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Odysseus\FrontBundle\Entity\Commande;
use Odysseus\UserBundle\Entity\Etat;
use Odysseus\UserBundle\Entity\Modepaiement;
use Odysseus\UserBundle\Entity\User;

class CommandePanierController extends Controller
{
    
    public function calculMontant()
    {
        $session = $this->getRequest()->getSession();
        $produits = $em->getRepository('OdysseusFrontBundle:ProduitVente')->findArray(array_keys($session->get('panier')));
        $prixAvecComm = 0;
        $totalAvecCom = 0;
        
        foreach ($produits as $produit) {
           
           $prixAvecComm = $produit->getPrix() * $panier[$produit->getIdProduitVente()] * 1.05;
           $totalAvecCom += $prixComm;
       }
       
       return $totalAvecCom;
        
    }
    
    public function prepareCommandeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        
        //on crée la session avec la commande en cours dans le panier
        if(!$session->has('commande')){
            $commande = new Commande();   
        } else {
            $commande = $em->getRepository('OdysseusFrontBundle:Commande')->find($session->get('commande'));
        }
       
       //on récupère les variables de session
       $adresse = $session->get('adresse');
       $panier = $session->get('panier');
       
       //je remplis les différents attr d'une commande selon les données
       //ip
       $commande->setClientIp($this->request->server->get('REMOTE_ADDR')) ;
       //date commande et paiement
       $commande->setDateCommande(new \DateTime());
       $commande->setDatePaiement(new \DateTime());
       
       //montant
       $commande->setMontant($this->calculMontant());
       
       //adresse de livraison et facturation
       $livraison = $em->getRepository('OdysseusFrontBundle:Adresse')->find($adresse['livraison']);
       $commande->setAdresseLivraisonId($livraison->getIdAdresse());
       $facturation = $em->getRepository('OdysseusFrontBundle:Adresse')->find($adresse['facturation']);
       $commande->setAdresseFacturationId($facturation->getIdAdresse());
       //user
       $user = $user = $this->container->get('security.context')->getToken()->getUser();
       $commande->setUser($user);
       //mode de paiement
       $mode = new Modepaiement(); 
       $commande->setModePaiement($mode->getNom('cheque'));
       //etat
       $commande->setEtat(Etat::EN_ATTENTE_PAIEMENT);  
       
       //produits reliés à la commande
       //on récupère les produits das le panier 
       $produits = $em->getRepository('OdysseusFrontBundle:ProduitVente')->findArray(array_keys($session->get('panier')));

       foreach ($produits as $produit) {
           $commande->addProduitVenteProduitVente($produitVenteProduitVente);
       }
       
       
       if(!$session->has('commande')){
           $em->persist($commande);
           $session->set('commande', $commande);
       }
       
       $em->flush();
       
       return new Response($commande->getIdCommande());
       
    } 
    
    
    
}