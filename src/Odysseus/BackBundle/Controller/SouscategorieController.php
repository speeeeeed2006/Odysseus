<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Souscategorie;
use Odysseus\BackBundle\Form\SousCategorieType;


class SouscategorieController extends Controller
{
    
    public function listerAction()
    {
        $listeSousCategories =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Souscategorie')
                                 ->findAll();
        
        foreach ($listeSousCategories as $sousCategorie)
        {
            $sousCategorie->getCategorie();
        }
        
        return $this->render('OdysseusBackBundle:Souscategorie:lister.html.twig',
        	array('liste_souscategories' => $listeSousCategories)
        );
    }
    
    public function ajouterAction()
    {
        //on crée un objet catégorie
        $sousCategorie = new Souscategorie();

        //le form builder
        $form = $this->createForm(new SouscategorieType, $sousCategorie);

        //on récupère la requete
        $request = $this->get('request');

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($sousCategorie);
                $em->flush();

                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('info', 'Sous-catégorie bien ajoutée');
                
                //on redirige vers la page de visualisation des catégories
                return $this->redirect($this->generateUrl('odysseus_back_lister_souscategorie'));
            }   
        }

    	//on affiche sinon le form avec les données entrées
    	return $this->render('OdysseusBackBundle:Souscategorie:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
    public function modifierAction(Souscategorie $sousCategorie)
    {
        //le form builder
        $form = $this->createForm(new SouscategorieType(), $sousCategorie);

        //on récupère la requete
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($sousCategorie);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('info', 'Sous-catégorie bien modifiée');

                //on redirige vers la page liste des catégories
                return $this->redirect($this->generateUrl('odysseus_back_lister_souscategorie'));
            }   
        }
        return $this->render('OdysseusBackBundle:Souscategorie:modifier.html.twig', array(
            'form' => $form->createView(),
            'sousCategorie' =>$sousCategorie
        ));

    }
    

    public function supprimerAction(Souscategorie $sousCategorie)
    {
       //on crée un champ vide qui ne contiendra que le champ CRSF (permet de protéger la suppression de catégorie)
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
                $em->remove($sousCategorie);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('info', 'Sous Catégorie bien supprimée');
               
                //on redirige vers la page liste des catégories
                return $this->redirect($this->generateUrl('odysseus_back_lister_souscategorie'));
           }   
      }
       
      return $this->render('OdysseusBackBundle:sousCategorie:supprimer.html.twig', array(
           'sousCategorie' => $sousCategorie,
            'form' =>$form->createView()
      ));
        
    }
      
}