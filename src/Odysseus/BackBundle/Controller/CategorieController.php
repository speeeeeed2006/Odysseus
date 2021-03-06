<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Categorie;
use Odysseus\BackBundle\Form\CategorieType;


class CategorieController extends Controller
{
    
    public function listerAction()
    {
        $listeCategories =  $this->getDoctrine()
                                 ->getManager()
                                 ->getRepository('OdysseusFrontBundle:Categorie')
                                 ->findAll();
        
        return $this->render('OdysseusBackBundle:Categorie:lister.html.twig',
        	array('liste_categories' => $listeCategories)
        );
    }
    
    public function ajouterAction() {
            //on cree un objet categorie
        $categorie = new Categorie();

        //le form builder
        $form = $this->createForm(new CategorieType, $categorie);

        //on recupere la requete
        $request = $this->get('request');

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on verifie que les chps sont corrects
            if($form->isValid()) {
                
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($categorie);
                $em->flush();

                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('categorie', 'Catégorie bien ajoutée');
                
                //on redirige vers la page de visualisation des cat√©gories
                return $this->redirect($this->generateUrl('odysseus_back_lister_categorie'));
            }   
        }

    	//on affiche sinon le form avec les donn√©es entr√©es
    	return $this->render('OdysseusBackBundle:Categorie:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
    public function modifierAction(Categorie $categorie)
    {
        //le form builder
        $form = $this->createForm(new CategorieType(), $categorie);

        //on r√©cup√®re la requete
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on v√©rifie que les chps sont corrects
            if($form->isValid()) {
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($categorie);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('categorie', 'Catégorie bien modifiée');

                return $this->redirect($this->generateUrl('odysseus_back_lister_categorie'));
            }   
        }
        
        return $this->render('OdysseusBackBundle:Categorie:modifier.html.twig', array(
            'form' => $form->createView(),
            'categorie' =>$categorie
        ));

    }
        

    public function supprimerAction(Categorie $categorie)
    {
       //on cr√©e un champ vide qui ne contiendra que le champ CRSF (permet de prot√©ger la suppression de cat√©gorie)
       $form = $this->createFormBuilder()->getForm();
        
       //on r√©cup√®re la requete
       $request = $this->getRequest();

       if ($request->getMethod() == 'POST'){
           //on fait le lien requete ->form
          $form->bind($request);
           
           //on v√©rifie que les chps sont corrects
           if($form->isValid()) {
              //on supprime l'article
                $em = $this->getDoctrine()->getManager();
                $em->remove($categorie);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('categorie', 'Catégorie bien supprimée');
               
                //on redirige vers la page liste des cat√©gories
                return $this->redirect($this->generateUrl('odysseus_back_lister_categorie'));
           }   
      }
       
      return $this->render('OdysseusBackBundle:Categorie:supprimer.html.twig', array(
           'categorie' => $categorie,
            'form' =>$form->createView()
      ));
        
    }
  
    
}