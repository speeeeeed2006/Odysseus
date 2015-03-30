<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\UserBundle\Entity\User;


class ClientController extends Controller
{
    
    public function listerAction()
    {
        $listeClients =  $this->getDoctrine()->getManager()
                              ->getRepository('OdysseusUserBundle:User')
                              ->findAll();
        
        /*foreach ($listeClients as $client) {
              $client['adresse']  =   $this->getDoctrine()->getManager()
                                           ->getRepository('OdysseusFrontBundle:Adresse')
                                           ->getAdresseFacturationClient($client->getId_client(), 1);          
        }*/     
        
        //$this->get('ladybug')->log($listeClients);
        return $this->render('OdysseusBackBundle:Client:lister.html.twig',
        	array('liste_clients' => $listeClients)
        );
    }
    
    public function bannirAction($id)
    {
        //$em = $this->getDoctrine()->getManager();
        
        $client = $em->getRepository('OdysseusUserBundle:User')
                     ->findOneByUser($id);
        
//        if (!$client) {
//            throw $this->createNotFoundException('Aucun client trouvé pour cet id : '.$id);
//        }

        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        ladybug_dump($etat->findOneBy(array('nom' => 'banni')));
        die();
        
        //change son etat et sa date de modification
        //$client->setEtat($etat->getIdEtatBanni());
        
        
       
        //$client->setDateModification(new \DateTime('now'));
        //$em->flush();
        
        //on affiche un message flash
        //$this->get('session')->getFlashBag()->add('client', 'Le/la client(e) a bien été banni(e).');

        return $this->redirect($this->generateUrl('odysseus_back_lister_client'));
    }   
    
}