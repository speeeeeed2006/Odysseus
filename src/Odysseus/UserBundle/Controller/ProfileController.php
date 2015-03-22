<?php

namespace Odysseus\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Odysseus\UserBundle\Entity\User;
use Odysseus\UserBundle\Form\Type\ProfileFormType;

class ProfileController extends BaseController
{
    public function showAction(Request $request)
    {
        $formFactory = $this->container->get('odysseus.profile.form.type');
         
        $form = $formFactory->createForm(new ProfileFormType());
         
        return $this->container->get('templating')->renderResponse('FOSUserBundle:Profile:edit_content.html.twig',
            array(
                   'form' => $form->createView(),
            )); 

    }
}