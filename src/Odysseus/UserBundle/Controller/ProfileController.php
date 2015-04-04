<?php
namespace Odysseus\UserBundle\Controller;

use Odysseus\UserBundle\Form\Type\ProduitAjaxRechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Odysseus\UserBundle\Form\Type\ProfileFormType;
use Odysseus\UserBundle\Form\Type\ClientType;
use Odysseus\UserBundle\Form\Type\AdresseType;
use Odysseus\UserBundle\Form\Type\CollectionAdresseType;

class ProfileController extends Controller
{
    public function editAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();


        $form = $this->createForm(new ClientType(), $user);

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($this->get('request'));

            //on verifie que les chps sont corrects
            if($form->isValid()) {

                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                foreach ($user->getAdresse() as $adresse) {
                    $em->persist($adresse);
                    $em->flush();
                }



                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('categorie', 'Profil bien ajouté');

                //on redirige vers la page de visualisation du profil
                return $this->redirect($this->generateUrl('odysseus_front_profile_view'));
            }
        }

        return $this->render('OdysseusUserBundle:Profile:edit_content.html.twig',
            array('form' => $form->createView())
        );
    }

    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        return $this->render('OdysseusUserBundle:Profile:show.html.twig', array(
            'user' => $user
        ));
    }

    public function adresseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $liste_adresse= $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresse($user);

        return $this->render('OdysseusUserBundle:Profile:adresse.html.twig', array(
            'user'          => $user,
            'liste_adresse' => $liste_adresse
        ));
    }

    public function adresseEditAction($id)
    {
        $em         = $this->getDoctrine()->getManager();
        $user       = $this->getUser();
        $adresse    = $em->getRepository('OdysseusFrontBundle:Adresse')->find($id);

        $form = $this->createForm(new AdresseType(), $adresse);

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($this->get('request'));

            //on verifie que les chps sont corrects
            if($form->isValid()) {

                $em->persist($adresse);
                $em->flush();
            }
            //on redirige vers la page de visualisation du profil
            return $this->redirect($this->generateUrl('odysseus_front_profile_adresse'));
        }

        return $this->render('OdysseusUserBundle:Profile:adresse_edit.html.twig',array(
            'form' => $form->createView()));
    }

    public function adresseSuppressionAction($id)
    {
        $em         = $this->getDoctrine()->getManager();
        $user       = $this->getUser();
        $adresse    = $em->getRepository('OdysseusFrontBundle:Adresse')->find($id);

        $form = $this->createForm(new AdresseType(), $adresse);

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($this->get('request'));
            //on verifie que les chps sont corrects
            if($form->isValid()) {
                $adresse->setEtat(\Odysseus\FrontBundle\Entity\Adresse::OBSOLETE);


                $em->persist($adresse);
                $em->flush();
            }
            //on redirige vers la page de visualisation du profil
            return $this->redirect($this->generateUrl('odysseus_front_profile_adresse'));
        }

        return $this->render('OdysseusUserBundle:Profile:adresse_supp.html.twig',array(
            'form' => $form->createView()));
    }

    public function articleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $liste_article  = $em->getRepository('OdysseusFrontBundle:ProduitVente')->getUserProduitVente($user);

        return $this->render('OdysseusUserBundle:Profile:article_content.html.twig', array(
            'user'          => $user,
            'liste_article' => $liste_article
        ));
    }

    public function ajouterArticleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $listeCategorie      = $em->getRepository('OdysseusFrontBundle:Categorie')->findAll();
        //$sousCategorie  = $em->getRepository('OdysseusFrontBundle:Souscategorie')->findAll();
        //$produit        = $em->getRepository('OdysseusFrontBundle:Produit')->findAll();


        return $this->render('OdysseusUserBundle:Profile:article_ajout.html.twig', array(
            'liste_categorie'         => $listeCategorie
        ));
    }
}
