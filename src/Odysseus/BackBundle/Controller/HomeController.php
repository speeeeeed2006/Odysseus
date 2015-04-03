<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\ProduitVente;

class HomeController extends Controller
{
 
    public function choisirNouveauteAction(ProduitVente $produit)
    {
        $form = $this->createForm(new NouveauteType(), $produit);

//        $request = $this->getRequest();
//
//        if ($request->getMethod() == 'POST'){
//
//            $form->bind($request);
//            
//            //on vérifie que les chps sont corrects
//            if($form->isValid()) {
//                //on en registre notre objet ds la bdd
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($produit);
//                $em->flush();
//                
//                //on affiche un message flash
//                $this->get('session')->getFlashBag()->add('produitNouveaute', 'Produit mis en nouveauté');
//
//                //on redirige vers la page liste des etats
//                //return $this->redirect($this->generateUrl('odysseus_back_homepage'));
//            }   
//        }
        return $this->render('OdysseusBackBundle:Front:choisirProduitNouveaute.html.twig', array(
            'form' => $form->createView(),

        ));
       
    }
    
//    public function modifierAction(Pagestatique $page)
//    {
//        //le form builder
//        $form = $this->createForm(new PageStatiqueType(), $page);
//
//        //on récupère la requete
//        $request = $this->getRequest();
//
//        if ($request->getMethod() == 'POST'){
//            //on fait le lien requete ->form
//            $form->bind($request);
//            
//            //on vérifie que les chps sont corrects
//            if($form->isValid()) {
//                //on en registre notre objet ds la bdd
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($page);
//                $em->flush();
//                
//                //on affiche un message flash
//                $this->get('session')->getFlashBag()->add('page', 'Page bien modifiée');
//
//                //on redirige vers la page liste des etats
//                return $this->redirect($this->generateUrl('odysseus_back_lister_pages'));
//            }   
//        }
//        return $this->render('OdysseusBackBundle:PageStatique:modifier.html.twig', array(
//            'form' => $form->createView(),
//            'page' =>$page
//        ));
//
//    }
}