<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\UserBundle\Entity\User;


class ClientController extends Controller
{
    
    //revoir la function pour récupéerer le user + adresse
    public function listerAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeClients = $em->getRepository('OdysseusUserBundle:User')
                           ->findAll();
        
        $listeAdresses = array();
        
        foreach($listeClients as $client){  
           
            $adresse = $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($client);     
            //ladybug_dump_die($adresse)  ;
            var_dump($adresse);
            die();
            array_push($listeAdresses, $adresse);
            
            
        }
        
            

        //ladybug_dump($listeAdresse);
        //die();
        return $this->render('OdysseusBackBundle:Client:lister.html.twig',
        	array('liste_clients' => $listeClients,
                      'liste_adresses' => $listeAdresses  
                    )
        );
    }
    
    public function bannirAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $client = $em->getRepository('OdysseusUserBundle:User')
                     ->find($id);
        
        if (!$client) {
            throw $this->createNotFoundException('Aucun client trouvé pour cet id : '.$id);
        }
        
        $etat = $em->getRepository('OdysseusFrontBundle:Etat');
        
        $client->setEtat($etat->getEtatBanni());
        $client->setDateModification(new \DateTime('now'));
        
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('client', 'Le/la client(e) a bien été banni(e).');

        return $this->redirect($this->generateUrl('odysseus_back_lister_client'));
    }   
    
}