<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\Client;


class ClientController extends Controller
{
    
    public function listerAction()
    {
        $listeClients =  $this->getDoctrine()->getManager()
                              ->getRepository('OdysseusFrontBundle:Client')
                              ->findAll();
   
        //echo '<pre>'; print_r($listeClients); echo '</pre>';
        return $this->render('OdysseusBackBundle:Client:lister.html.twig',
        	array('liste_clients' => $listeClients )
        );
    }
    
    public function bannirAction($user)
    {
        $em = $this->getDoctrine()->getManager();
        
        $client = $em->getRepository('OdysseusFrontBundle:Client')
                     ->findOneByUser($user);

        if (!$client) {
            throw $this->createNotFoundException('Aucun client trouvé pour cet id : '.$id);
        }

        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        //change son etat et sa date de modification
        $client->setEtat($etat->find(2));
       
        $client->setDateModification(new \DateTime('now'));
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('info', 'Le/la client(e) a bien été banni(e).');

        return $this->redirect($this->generateUrl('odysseus_back_lister_client'));
    }
    
//    public function isBanni($id){
//          
//        $isBanni =  $this->getDoctrine()->getManager()
//                              ->getRepository('OdysseusFrontBundle:Client')
//                              ->isBanni($id);
//       
//        return $isBanni;
//    }
    
    
}