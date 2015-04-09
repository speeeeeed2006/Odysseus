<?php
namespace Odysseus\UserBundle\Controller;

use Odysseus\BackBundle\Form\ProduitVenteType;
use Odysseus\FrontBundle\Entity\ProduitVente;
use Odysseus\UserBundle\Form\Type\ProduitAjaxRechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Odysseus\UserBundle\Form\Type\ProfileFormType;
use Odysseus\UserBundle\Form\Type\ClientType;
use Odysseus\UserBundle\Form\Type\AdresseType;
use Odysseus\UserBundle\Form\Type\CollectionAdresseType;


class ArticleProfileController extends Controller
{
    public function ajouterArticleInfoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $produit        = $em->getRepository('OdysseusFrontBundle:Produit')->find($id);

        $form = $this->createForm(new ProduitVenteType());

        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);

            //on vérifie que les chps sont corrects
            if($form->isValid()) {
                $produitVente = new ProduitVente();
                $produitVente   ->setUser($user)
                                ->setDateAjout(new \DateTime())
                                ->setEtat(ProduitVente::A_VALIDER)
                                ->setProduit($produit)
                                ->setPrix($form->get('prix')->getData())
                                ->setStock($form->get('stock')->getData())
                                ->setNouveaute(0)
                                ->setAlaune(0)
                                ->setRemarque($form->get('remarque')->getData());

                $em->persist($produitVente);
                $em->flush();

                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('produitvente', 'Article bien ajouté');

                //on redirige vers la page liste des catégories
                return $this->redirect($this->generateUrl('odysseus_front_profile_article_ajout_image', array('id' => $produitVente->getIdProduitVente())));
            }
        }
        return $this->render('OdysseusUserBundle:Profile:article_ajoutInfo.html.twig', array(
            'form'      => $form->createView(),
            'produit'   => $produit
        ));
    }
    
    public function ajouterArticleImageAction($id)
    {
        $em         = $this->getDoctrine()->getManager();
        $produit    = $em->getRepository('OdysseusFrontBundle:ProduitVente')->find($id);
        $image      = new \Odysseus\FrontBundle\Entity\Image();

        //le form builder
        $form = $this->createFormBuilder($image)
                     ->add('nom')
                     ->add('file')
                     ->getForm();
        
        if($this->getRequest()->isMethod('POST')){
            
            //$form->bind($request);
            $form->handleRequest($this->getRequest());
            
            if ($form->isValid()){
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                
                $image->setProduitVente($produit);
                
                $em->persist($image);
                
                $image->setEtat(\Odysseus\FrontBundle\Entity\Image::ACTIVEE);
                $em->flush();    

                //on redirige vers la page de visualisation des images
                return $this->redirect($this->generateUrl('odysseus_front_profile_article'));              
            }          
        }
 
    	//on affiche sinon le form avec les donn√©es entr√©es
    	return $this->render('OdysseusUserBundle:Profile:article_ajoutImage.html.twig', array(
            'form' => $form->createView(),
        ));        
    }
}