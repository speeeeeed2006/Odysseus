<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Pagestatique;
use Odysseus\BackBundle\Form\PageStatiqueType;


class PageStatiqueController extends Controller
{
      
    
    public function creerAction() {
            //on crée un objet etat
        $page = new Pagestatique();

        //le form builder
        $form = $this->createForm(new PageStatiqueType(), $page);

        //on récupère la requete
        $request = $this->get('request');

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($page);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('page', 'Page bien créée');

                //on redirige vers la page de visualisation des catégories
                //return $this->redirect($this->generateUrl('odysseus_back_'));
            }   
        }

    	//on affiche sinon le form avec les données entrées
    	return $this->render('OdysseusBackBundle:PageStatique:creer.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
    
    
    
    public function modifierAction(Pagestatique $page)
    {
        //le form builder
        $form = $this->createForm(new PageStatiqueType(), $page);

        //on récupère la requete
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($page);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('page', 'page bien modifiée');

                //on redirige vers la page liste des etats
                //return $this->redirect($this->generateUrl(''));
            }   
        }
        return $this->render('OdysseusBackBundle:PageStatique:modifier.html.twig', array(
            'form' => $form->createView(),
            'page' =>$page
        ));

    }
}