<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackController extends Controller
{
    public function indexAction()
    {
        return $this->render('OdysseusBackBundle:Home:index.html.twig');
    }

}
