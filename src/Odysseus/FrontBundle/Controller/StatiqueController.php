<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatiqueController extends Controller
{
    public function planSiteAction()
    {
        return $this->render('OdysseusFrontBundle:Statique:planSite.html.twig');
    }

    public function contactAction()
    {
        return $this->render('OdysseusFrontBundle:Statique:contact.html.twig');
    }

    public function mentionsLegalesAction()
    {
        return $this->render('OdysseusFrontBundle:Statique:mentionsLegales.html.twig');
    }

    public function conditionsVentesAction()
    {
        return $this->render('OdysseusFrontBundle:Statique:conditionsVentes.html.twig');
    }
}
