<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\ProduitVente;
use Odysseus\BackBundle\Form\ProduitVenteType;


class ProduitVenteController extends Controller
{
    
    public function listerAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:ProduitVente')
                             ->findAll();
        
        return $this->render('OdysseusBackBundle:ProduitCatalogue:lister.html.twig',
        	array('liste_produits' => $listeProduits)
        );
    }
        
//    public function modifierAction(ProduitVente $produit)
//    {
//        //le form builder
//        $form = $this->createForm(new ProduitVenteType(), $produit);
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
//                $em->persist($produit);
//                $em->flush();
//                
//                //on affiche un message flash
//                $this->get('session')->getFlashBag()->add('info', 'Produit bien modifié');
//
//                //on redirige vers la page liste des catégories
//                return $this->redirect($this->generateUrl('odysseus_back_lister_produit_vente'));
//            }   
//        }
//        return $this->render('OdysseusBackBundle:ProduitVente:modifier.html.twig', array(
//            'form' => $form->createView(),
//            'produit' => $produit
//        ));
//    }
        

//    public function supprimerAction(ProduitVente $produit)
//    {
//       //on crée un champ vide qui ne contiendra que le champ CRSF (permet de protéger la suppression de Produit)
//       $form = $this->createFormBuilder()->getForm();
//        
//       //on récupère la requete
//       $request = $this->getRequest();
//
//       if ($request->getMethod() == 'POST'){
//           //on fait le lien requete ->form
//          $form->bind($request);
//           
//           //on vérifie que les chps sont corrects
//           if($form->isValid()) {
//              //on supprime l'article
//                $em = $this->getDoctrine()->getManager();
//                $em->remove($produit);
//                $em->flush();
//                
//                //on affiche un message flash
//                $this->get('session')->getFlashBag()->add('info', 'Produit bien supprimé');
//               
//                //on redirige vers la page liste des Produits
//                return $this->redirect($this->generateUrl('odysseus_back_lister_produit_vente'));
//           }   
//      }
//       
//      return $this->render('OdysseusBackBundle:ProduitVente:supprimer.html.twig', array(
//           'produit' => $produit,
//            'form' =>$form->createView()
//      ));    
//    }
    
    public function listeProduitsAValiderAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:ProduitVente')
                             ->getListeProduitVenteAValider();
        
        return $this->render('OdysseusBackBundle:ProduitVente:listerProdVenteAValider.html.twig',
        	array('liste_produits' => $listeProduits)
        );
    }  
    
}