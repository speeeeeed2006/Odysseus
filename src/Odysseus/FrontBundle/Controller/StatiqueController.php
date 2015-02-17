<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatiqueController extends Controller
{
    public function planSiteAction()
    {
        return $this->render('OdysseusFrontBundle:Statique:planSite.html.twig');
    }
}
