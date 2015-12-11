<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{

    public function ajaxRechercheAction($categorie, $sousCategorie, $marque)
    {
        $em = $this->getDoctrine()->getManager();
        //Récupération de la liste des produit satisfaisant les conditions
        $listeProduit = $em->getRepository('OdysseusFrontBundle:Produit')->getProduitAjaxRecherche($categorie, $sousCategorie, $marque);

        return $this->render('OdysseusFrontBundle:Ajax:produit_recherche.html.twig', array('liste_produit'  => $listeProduit));
    }

    public function ajaxRechercheMarqueAction($categorie, $sousCategorie)
    {
        $em = $this->getDoctrine()->getManager();

        $listeProduit = $em->getRepository('OdysseusFrontBundle:Produit')->getProduitAjaxRechercheMarque($categorie, $sousCategorie);


        return $this->render('OdysseusFrontBundle:Ajax:produit_recherchemarque.html.twig', array('liste_produit'  => $listeProduit));
    }
    
}