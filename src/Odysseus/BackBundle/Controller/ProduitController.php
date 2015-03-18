<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Produit;
use Odysseus\FrontBundle\Entity\Etat;
use Odysseus\BackBundle\Form\ProduitType;


class ProduitController extends Controller
{
    
    public function listerAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:Produit')
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
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit_catalogue'));
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
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit_catalogue'));
            }   
        }
        return $this->render('OdysseusBackBundle:Produit:modifier.html.twig', array(
            'form' => $form->createView(),
            'produit' => $produit
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
                $this->get('session')->getFlashBag()->add('info', 'Produit bien supprimé');
               
                //on redirige vers la page liste des Produits
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit_catalogue'));
           }   
      }
       
      return $this->render('OdysseusBackBundle:Produit:supprimer.html.twig', array(
           'produit' => $produit,
            'form' =>$form->createView()
      ));
        
    }
    
    public function listeProduitsAValiderAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:Produit')
                              ->getListeProduitAValider();
        
        return $this->render('OdysseusBackBundle:Produit:listerProdCatAValider.html.twig',
        	array('liste_produits' => $listeProduits,
                       )
        );
    }   
    
    public function validerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $produit = $em->getRepository('OdysseusFrontBundle:Produit')
                      ->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
        }

        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        $produit->setEtat($etat->find(4));
        $em->flush();

        return $this->redirect($this->generateUrl('odysseus_back_lister_produit_catalogue'));

    }
}