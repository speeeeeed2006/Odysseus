<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Produit;
use Odysseus\FrontBundle\Entity\Etat;
use Odysseus\BackBundle\Form\ProduitType;


class ProduitController extends Controller
{
    
    public function listerAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:Produit')
                             ->getListeProduit(15, $page);
        
        return $this->render('OdysseusBackBundle:Produit:lister.html.twig',
        	array(
                    'liste_produits' => $listeProduits,
                    'page'           => $page,
                    'nombrePage'     => ceil(count($listeProduits)/15)
                    )
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

                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('produit', 'Produit bien ajouté');
                
                //on redirige vers la page de visualisation des Produit
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit_catalogue', array('page' => 1)));
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
                $this->get('session')->getFlashBag()->add('produit', 'Produit bien modifié');

                //on redirige vers la page liste des catégories
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit_catalogue', array('page' => 1)));
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
                $this->get('session')->getFlashBag()->add('produit', 'Produit bien supprimé');
               
                //on redirige vers la page liste des Produits
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit_catalogue', array('page' => 1)));
           }   
      }
       
      return $this->render('OdysseusBackBundle:Produit:supprimer.html.twig', array(
           'produit' => $produit,
            'form' =>$form->createView()
      ));
        
    }
    
    public function listeProduitsAValiderAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:Produit')
                              ->getListeProduitAValider(10, $page);
        
        
        return $this->render('OdysseusBackBundle:Produit:listerProdCatAValider.html.twig',
        	array(
                        'liste_produits' => $listeProduits,
                        'page'           => $page,
                        'nombrePage'     => ceil(count($listeProduits)/10)
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
        
        $produit->setEtat($etat->getEtatValide());
           
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('produit', 'Le produit Catalogue a bien été validé');

        return $this->redirect($this->generateUrl('odysseus_back_lister_produit_catalogue', array('page' => 1)));
    }
    
    public function listeProduitsRefuseAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:Produit')
                              ->getListeProduitRefuse(10, $page);
        
        
        return $this->render('OdysseusBackBundle:Produit:listerProdCatRefuse.html.twig',
        	array(
                        'liste_produits' => $listeProduits,
                        'page'           => $page,
                        'nombrePage'     => ceil(count($listeProduits)/10)
                     )
        );
    }
    
    
    public function refuserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $produit = $em->getRepository('OdysseusFrontBundle:Produit')
                      ->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
        }

        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        $produit->setEtat($etat->find(5));
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('produit', 'Le produit Catalogue a été refusé');

        return $this->redirect($this->generateUrl('odysseus_back_lister_produit_catalogue', array('page' => 1)));
    }
    
}