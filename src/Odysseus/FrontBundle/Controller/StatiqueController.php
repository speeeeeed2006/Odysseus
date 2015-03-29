<?php

namespace Odysseus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Odysseus\FrontBundle\Form\ContactForm;

class StatiqueController extends Controller
{
    
    public function pageAction($id)
    {
        $em =  $this->getDoctrine()->getManager();
        
        $page = $em->getRepository('OdysseusFrontBundle:Pagestatique')->find($id);
        
        return $this->render('OdysseusFrontBundle:Statique:pageStatique.html.twig', array('page' => $page));
    }
    

    
    public function planSiteAction()
    {
        return $this->render('OdysseusFrontBundle:Statique:planSite.html.twig');
    }

    public function mentionsLegalesAction()
    {
        return $this->render('OdysseusFrontBundle:Statique:mentionsLegales.html.twig');
    }

    public function conditionsVentesAction()
    {
        return $this->render('OdysseusFrontBundle:Statique:conditionsVentes.html.twig');
    }

    /**
     * @Route("/contact", _name="contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        
        $form = $this->createForm(new ContactForm());

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($form->get('sujet')->getData())
                    ->setFrom($form->get('email')->getData())
                    ->setTo('carolinebleier@gmail.com')
                    ->setBody(
                        $this->renderView(
                            'OdysseusFrontBundle:Statique:contact.html.twig',
                            array(
                                'ip' => $request->getClientIp(),
                                'prenom' => $form->get('prenom')->getData(),
                                'nom' => $form->get('nom')->getData(),
                                'sujet' => $form->get('sujet')->getData(),
                                'message' => $form->get('message')->getData()
                            )
                        )
                    );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', 'Votre email a bien été envoyé. Merci!');

                return $this->redirect($this->generateUrl('home'));
            }
        }

        return array(
            'form' => $form->createView()
        );

    }
}
