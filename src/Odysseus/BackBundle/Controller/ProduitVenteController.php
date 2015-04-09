<?php

namespace Odysseus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Odysseus\FrontBundle\Entity\ProduitVente;
use Odysseus\BackBundle\Form\ProduitVenteType;


class ProduitVenteController extends Controller
{
    
    public function listerAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:ProduitVente')
                             ->getListeProduitVente(15, $page);
        
        return $this->render('OdysseusBackBundle:ProduitVente:lister.html.twig',
        	array(
                    'liste_produits' => $listeProduits,
                    'page'           => $page,
                    'nombrePage'     => ceil(count($listeProduits)/15)
                    )
        );
    }
        
    public function modifierAction(ProduitVente $produit)
    {
        //le form builder
        $form = $this->createForm(new ProduitVenteType(), $produit);

        //on récupère la requete
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);
            
            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($produit);
                $em->flush();
                
                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('produitvente', 'Produit bien modifié');

                //on redirige vers la page liste des catégories
                return $this->redirect($this->generateUrl('odysseus_back_lister_produit_vente', array('page' => 1)));
            }   
        }
        return $this->render('OdysseusBackBundle:ProduitVente:modifier.html.twig', array(
            'form' => $form->createView(),
            'produit' => $produit
        ));
    }
        
    public function listeProduitsAValiderAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:ProduitVente')
                             ->getListeProduitVenteAValider(10, $page);
        
        
        return $this->render('OdysseusBackBundle:ProduitVente:listerProdVenteAValider.html.twig',
        	array(
                        'liste_produits' => $listeProduits,
                        'page'           => $page,
                        'nombrePage'     => ceil(count($listeProduits)/10)
                     )
        );
    }
    
    public function validerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $produit = $em->getRepository('OdysseusFrontBundle:ProduitVente')
                      ->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
        }

        
        $produit->setEtat(ProduitVente::VALIDE);
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('produitvente', 'Le produit Vente a bien été validé');

        return $this->redirect($this->generateUrl('odysseus_back_lister_produit_vente', array('page' => 1)));

    }
    
    public function listeProduitsRefuseAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        
        $listeProduits =  $em->getRepository('OdysseusFrontBundle:ProduitVente')
                             ->getListeProduitVenteRefuse(10, $page);
        
        
        return $this->render('OdysseusBackBundle:ProduitVente:listerProdVenteRefuse.html.twig',
        	array(
                        'liste_produits' => $listeProduits,
                        'page'           => $page,
                        'nombrePage'     => ceil(count($listeProduits)/10)
                     )
        );
    }
    
    public function refuserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $produit = $em->getRepository('OdysseusFrontBundle:ProduitVente')
                      ->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Aucun produit trouvé pour cet id : '.$id);
        }
        
        $produit->setEtat(ProduitVente::REFUSE);
        $em->flush();
        
        //on affiche un message flash
        $this->get('session')->getFlashBag()->add('produitvente', 'Le produit vente a été refusé');

        return $this->redirect($this->generateUrl('odysseus_back_lister_produit_vente', array('page' => 1)));
    }
    
    
}