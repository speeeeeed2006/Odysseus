<?php
namespace Odysseus\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Odysseus\UserBundle\Form\Type\ProfileFormType;
use Odysseus\UserBundle\Form\Type\ClientType;
use Odysseus\UserBundle\Form\Type\AdresseType;

class ProfileController extends Controller
{
    public function editAction()
    {
        $form = $this->createForm(new ProfileFormType() );
        
        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($this->get('request'));
            
            $form = $this->createForm(new ProfileFormType(), array (
                'username' => 'à remonter',
                'email' => 'à remonter',
                ));
            //on verifie que les chps sont corrects
            /*if($form->isValid()) {
                
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($);
                $em->flush();

                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('categorie', 'Profil bien ajouté');
                
                //on redirige vers la page de visualisation du profil
                return $this->redirect($this->generateUrl('fos_user_'));
            } */  
        }
        
        
        
        return $this->render('OdysseusUserBundle:Profile:edit_content.html.twig', 
                array('form' => $form->createView())
                );
    }
    
    public function showAction()
    {
        parent::showAction();
    }
}
