<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Client;
//use Odysseus\BackBundle\Form\ClientType;


class ClientController extends Controller
{
    
    public function listerAction()
    {
        $listeClients =  $this->getDoctrine()->getManager()
                              ->getRepository('OdysseusFrontBundle:Client')
                              ->findAll();
        
        return $this->render('OdysseusBackBundle:Client:lister.html.twig',
        	array('liste_clients' => $listeClients)
        );
    }
    
    //modifier le client ou le blacklister direct ?
    
//    public function modifierAction(Client $client)
//    {
//        //le form builder
//        $form = $this->createForm(new ClientType(), $client);
//
//        //on récupère la requete
//        $request = $this->getRequest();
//
//        if ($request->getMethod() == 'POST'){
//            //on fait le lien requete ->form
//            $form->bind($request);
//            
//            //on vérifie que les chps sont corrects
//            if($form->isValid()) {
//                //on en registre notre objet ds la bdd
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($etat);
//                $em->flush();
//                
//                //on affiche un message flash
//                $this->get('session')->getFlashBag()->add('info', 'Etat bien modifié');
//
//                //on redirige vers la page liste des etats
//                return $this->redirect($this->generateUrl('odysseus_back_lister_etat'));
//            }   
//        }
//        return $this->render('OdysseusBackBundle:Etat:modifier.html.twig', array(
//            'form' => $form->createView(),
//            'etat' =>$etat
//        ));
//
//    }
 
    
}