<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\ImageSlider;
//use Odysseus\BackBundle\Form\ImageSliderType;


class ImageSliderController extends Controller
{
    
    public function listerAction()
    {
        $listeImages = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('OdysseusFrontBundle:ImageSlider')
                             //revoir la méthode
                            ->findAll();
        
        $this->get('ladybug')->log($listeImages);
        
        return $this->render('OdysseusBackBundle:ImageSlider:lister.html.twig',
        	array('liste_images' => $listeImages)
        );
    }
    
    public function ajouterAction() {

        $image = new ImageSlider();

        //le form builder
        $form = $this->createFormBuilder($image)
                     ->add('nom')
                     ->add('file')
                     ->getForm();
        
        if($this->getRequest()->isMethod('POST')){
            
            //$form->bind($request);
            $form->handleRequest($this->getRequest());
            
            if ($form->isValid()){
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($image);
                $em->flush();    
            
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('imageSlider', 'Image Slider bien téléchargée');

                //on redirige vers la page de visualisation des images
                return $this->redirect($this->generateUrl('odysseus_back_lister_image_slider'));              
            }          
        }
 
    	//on affiche sinon le form avec les donn√©es entr√©es
    	return $this->render('OdysseusBackBundle:ImageSlider:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));        
    }
    
    public function activerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $imageSlider = $em->getRepository('OdysseusFrontBundle:ImageSlider')->find($id);
        
        if (!$imageSlider) {
            throw $this->createNotFoundException('Aucune image du slider trouvée pour cet id : '.$id);
        }

        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        $imageSlider->setEtat($etat->getEtatActive());
           
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('imageSlider', 'Image slider a bien été activée sur la home');

        return $this->redirect($this->generateUrl('odysseus_back_lister_image_slider'));
    }
    
    
    public function desactiverAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $imageSlider = $em->getRepository('OdysseusFrontBundle:ImageSlider')->find($id);
        
        if (!$imageSlider) {
            throw $this->createNotFoundException('Aucune image du slider trouvée pour cet id : '.$id);
        }

        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        $imageSlider->setEtat($etat->getEtatDesactive());
           
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('imageSlider', 'Image slider a bien été désactivée de la home');

        return $this->redirect($this->generateUrl('odysseus_back_lister_image_slider'));
    }
    
    public function supprimerAction(ImageSlider $image)
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
                $em->remove($image);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('imageSlider', 'Image slider bien supprimée');
               
                //on redirige vers la page liste des cat√©gories
                return $this->redirect($this->generateUrl('odysseus_back_lister_image_slider'));
           }   
      }
       
      return $this->render('OdysseusBackBundle:ImageSlider:supprimer.html.twig', array(
            'form' =>$form->createView(),
            'image' => $image
      ));
        
    }
    
    public function isActiveAction(ImageSlider $image)
    {
        return ;
    }
  
    
}