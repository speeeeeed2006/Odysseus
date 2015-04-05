<?php
namespace Odysseus\FrontBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListener
{
    public function __construct(ContainerInterface $container, Session $session)
    {
        $this->session = $session;
        $this->router = $container->get('router');
        $this->securityContext = $container->get('security.context');   
    }
    
    public function onKernelRequest(GetResponseEvent $event)
    {
        $route = $event->getRequest()->attributes->get('_route');
        
        //si on essaie d'atteindre le panier directement avec l'url : sécurisation
        if( $route == 'odysseus_front_livraison' ){ //|| $route == 'validation'
            if($this->session->has('panier')) {
                //le panier ne peut pas être vide
                if(count($this->session->has('panier')) == 0)
                    $event->setResponse(new RedirectResponse($this->router->generate('odysseus_front_panier')));      
            }
            
            //on vérifie si l'utilisateur est bien loggué
            if(!is_object($this->securityContext->getToken()->getUser())){
                $this->session->getFlashBag()->add('notification', 'Vous devez vous identifier pour poursuivre votre commande.');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }  
       
    }
}

