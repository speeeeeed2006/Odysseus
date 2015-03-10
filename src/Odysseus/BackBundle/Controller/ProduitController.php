<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Produit;
use Odysseus\BackBundle\Form\ProduitType;


class ProduitController extends Controller
{
    
    public function listerAction()
    {
        $listeProduits =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Produit')
                                 ->findAll();
        
        return $this->render('OdysseusBackBundle:Produit:lister.html.twig',
        	array('liste_produits' => $listeProduits)
        );
    }
    
    public function ajouterAction() {
            //on crée un objet Produit
        $produit = new Produit();

        //le form builder
        $form = $this->createForm(new ProduitType, $produit);

        //on récupère la requete
        $request = $this->get('request');

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($produit);
                $em->flush();

                //on redirige vers la page de visualisation des Produit
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit'));
            }   
        }

    	//on affiche sinon le form avec les données entrées
    	return $this->render('OdysseusBackBundle:Produit:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
    public function modifierAction(Produit $produit)
    {
        //le form builder
        $form = $this->createForm(new ProduitType(), $produit);

        //on récupère la requete
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($produit);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('info', 'Produit bien modifié');

                //on redirige vers la page liste des catégories
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit'));
            }   
        }
        return $this->render('OdysseusBackBundle:Produit:modifier.html.twig', array(
            'form' => $form->createView(),
            'produit' =>$produit
        ));

    }
        

    public function supprimerAction(Produit $produit)
    {
       //on crée un champ vide qui ne contiendra que le champ CRSF (permet de protéger la suppression de Produit)
       $form = $this->createFormBuilder()->getForm();
        
       //on récupère la requete
       $request = $this->getRequest();

       if ($request->getMethod() == 'POST'){
           //on fait le lien requete ->form
          $form->bind($request);
           
           //on vérifie que les chps sont corrects
           if($form->isValid()) {
              //on supprime l'article
                $em = $this->getDoctrine()->getManager();
                $em->remove($produit);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('info', 'Produit bien supprimée');
               
                //on redirige vers la page liste des Produits
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit'));
           }   
      }
       
      return $this->render('OdysseusBackBundle:Produit:supprimer.html.twig', array(
           'produit' => $produit,
            'form' =>$form->createView()
      ));
        
    }
  
    
}