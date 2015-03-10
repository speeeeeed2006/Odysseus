<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Etat;
use Odysseus\BackBundle\Form\EtatType;


class EtatController extends Controller
{
    
    public function listerAction()
    {
        $listeEtats =  $this->getDoctrine()
                            ->getManager()
                            ->getRepository('OdysseusFrontBundle:Etat')
                            ->findAll();
        
        return $this->render('OdysseusBackBundle:Etat:lister.html.twig',
        	array('liste_etats' => $listeEtats)
        );
    }
    
    public function ajouterAction() {
            //on crée un objet etat
        $etat = new Etat();

        //le form builder
        $form = $this->createForm(new EtatType, $etat);

        //on récupère la requete
        $request = $this->get('request');

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($etat);
                $em->flush();

                //on redirige vers la page de visualisation des catégories
                return $this->redirect($this->generateUrl('odysseus_back_lister_etat'));
            }   
        }

    	//on affiche sinon le form avec les données entrées
    	return $this->render('OdysseusBackBundle:Etat:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
    public function modifierAction(Etat $etat)
    {
        //le form builder
        $form = $this->createForm(new EtatType(), $etat);

        //on récupère la requete
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($etat);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('info', 'Etat bien modifié');

                //on redirige vers la page liste des etats
                return $this->redirect($this->generateUrl('odysseus_back_lister_etat'));
            }   
        }
        return $this->render('OdysseusBackBundle:Etat:modifier.html.twig', array(
            'form' => $form->createView(),
            'etat' =>$etat
        ));

    }
        

    public function supprimerAction(Etat $etat)
    {
       //on crée un champ vide qui ne contiendra que le champ CRSF (permet de protéger la suppression de l'état
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
                $em->remove($etat);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('info', 'Etat bien supprimé');
               
                //on redirige vers la page liste des états
                return $this->redirect($this->generateUrl('odysseus_back_lister_etat'));
           }   
      }
       
      return $this->render('OdysseusBackBundle:Etat:supprimer.html.twig', array(
           'etat' => $etat,
            'form' =>$form->createView()
      ));
        
    }
  
    
}