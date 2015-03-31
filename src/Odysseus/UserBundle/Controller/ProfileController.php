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
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $adresse = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($user);
        
        // replace findAll() with a more restrictive query if you need to
        $adresse = $this->getDoctrine()->getManager()
            ->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($user);

        $form = $this->createForm(
            new \MultiAdresseType(),
            array('adresse' => $adresse)
        );
        $form = $this->createForm(new ClientType, $user);
        
        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($this->get('request'));
            
            $form = $this->createForm(new ProfileFormType(), array (
                'email'     => $user->getEmail(),
                'prenom'    => $user->getPrenom(),
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
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $adresse = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($user);
        
        return $this->render('OdysseusUserBundle:Profile:show.html.twig', array(
            'user' => $user,
            'adresse' => $adresse
        ));
    }
    
     public function adresseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $adresse = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($user);
        
        $form = $this->createForm(new AdresseType(), $user->getAdresse());
        
        return $this->render('OdysseusUserBundle:Profile:show.html.twig', array(
            'user' => $user,
            'adresse' => $adresse
        ));
    }
}
