<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Odysseus\FrontBundle\Form\RechercheType;

class SousCategorieController extends Controller
{

    public function rechercheByCategorieAction($categorie)
    {
        $em = $this->getDoctrine()->getManager();

        $listeSousCategorie      = $em->getRepository('OdysseusFrontBundle:Souscategorie')->getListeSouscategorieparCategorie($categorie);

        return $this->render('OdysseusFrontBundle:Ajax:souscategorie_recherche.html.twig', array('liste_souscategorie'  => $listeSousCategorie));
    }
}