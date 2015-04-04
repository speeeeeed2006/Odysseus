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

        /*$image = new Image();

        //le form builder
        $formImage = $this->createFormBuilder($image)
            ->add('nom')
            ->add('file')
            ->getForm();

        if($this->getRequest()->isMethod('POST')){

            //$form->bind($request);
            $form->handleRequest($this->getRequest());

            if ($form->isValid()){
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();

                $em->persist($imageSlider);

                $imageSlider->setEtat(ImageSlider::ACTIVEE);
                $em->flush();

                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('imageSlider', 'Image Slider bien téléchargée');

                //on redirige vers la page de visualisation des images
                return $this->redirect($this->generateUrl('odysseus_back_lister_image_slider'));
            }

            */

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
                return $this->redirect($this->generateUrl('odysseus_front_profile_article'));
            }
        }
        return $this->render('OdysseusUserBundle:Profile:article_ajoutInfo.html.twig', array(
            'form'      => $form->createView(),
            'produit'   => $produit
        ));
    }
}