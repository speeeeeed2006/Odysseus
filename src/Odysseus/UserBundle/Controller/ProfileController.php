<?php
namespace Odysseus\UserBundle\Controller;

use Odysseus\UserBundle\Form\Type\ProduitAjaxRechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Odysseus\UserBundle\Form\Type\ProfileFormType;
use Odysseus\UserBundle\Form\Type\ClientType;
use Odysseus\UserBundle\Form\Type\AdresseType;
use Odysseus\UserBundle\Form\Type\ProduitType;
use Odysseus\FrontBundle\Entity\Adresse;
use Odysseus\FrontBundle\Entity\Produit;

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

        $liste_adresse_livraison    =   $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseLivraison($user);
        $liste_adresse_facturation  =   $em->getRepository('OdysseusFrontBundle:Adresse')->getListeAdresseFacturation($user);

        return $this->render('OdysseusUserBundle:Profile:adresse.html.twig', array(
            'user'          => $user,
            'liste_adresse_livraison'   => $liste_adresse_livraison,
            'liste_adresse_facturation' => $liste_adresse_facturation
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

    public function adresseAjoutAction()
    {
        $em         = $this->getDoctrine()->getManager();
        $user       = $this->getUser();
        $adresse    = new \Odysseus\FrontBundle\Entity\Adresse();

        $form = $this->createForm(new AdresseType(),$adresse);

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($this->get('request'));

            //on verifie que les chps sont corrects
            if($form->isValid()) {
                $adresse->setEtat(Adresse::VALIDE);
                $adresse->setUser($user);
                $em->persist($adresse);
                $em->flush();
            }
            //on redirige vers la page de visualisation du profil
            return $this->redirect($this->generateUrl('odysseus_front_profile_adresse'));
        }

        return $this->render('OdysseusUserBundle:Profile:adresse_ajout.html.twig',array(
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
        $listeArticle_image  = array();

        foreach ($liste_article as $article){
            $image = $em->getRepository('OdysseusFrontBundle:Image')->getImageProduit($article);

            array_push($listeArticle_image, array('article' => $article, 'image' => $image));
        }

        return $this->render('OdysseusUserBundle:Profile:article_content.html.twig', array(
            'user'          => $user,
            'listeArticle_image' => $listeArticle_image
        ));
    }

    public function ajouterArticleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $listeCategorie      = $em->getRepository('OdysseusFrontBundle:Categorie')->findAll();

        return $this->render('OdysseusUserBundle:Profile:article_ajout.html.twig', array(
            'liste_categorie'         => $listeCategorie
        ));
    }
    
    public function commandeProfileAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $listeCommande          = $em->getRepository('OdysseusFrontBundle:Commande')->getCommandeOfClient($user);
        $listeCommande_Adresse  = array();
        
        foreach ($listeCommande as $commande){
           $adresse = $em->getRepository('OdysseusFrontBundle:Adresse')->find($commande->getAdresseLivraisonId());
           array_push($listeCommande_Adresse, array('commande' => $commande, 'adresse' => $adresse));
        }

        return $this->render('OdysseusUserBundle:Profile:commande_show.html.twig', array(
            'listeCommande_Adresse'         => $listeCommande_Adresse
        ));
    }

    public function commandeDetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $commande   = $em->getRepository('OdysseusFrontBundle:Commande')->find($id);
        $adresse_livraison = $em->getRepository('OdysseusFrontBundle:Adresse')->find($commande->getAdresseLivraisonId());
        if(!is_null($commande->getAdresseFacturationId()))
        $adresse_facturation = $em->getRepository('OdysseusFrontBundle:Adresse')->find($commande->getAdresseFacturationId());


        return $this->render('OdysseusUserBundle:Profile:commande_show_detail.html.twig', array(
            'commande'              => $commande,
            'adresse_livraison'     => $adresse_livraison,
            'adresse_facturation'   => $adresse_facturation,
        ));
    }

    public function ajoutProduitAction()
    {
        $produit = new Produit();

        //le form builder
        $form = $this->createForm(new ProduitType, $produit);

        //on récupère la requete
        $request = $this->get('request');

        if ($this->getRequest()->getMethod() == 'POST'){
            //on fait le lien requete ->form
            $form->bind($request);

            //on vérifie que les chps sont corrects
            if($form->isValid()) {

                $produit->setEtat(Produit::A_VALIDER)
                        ->setPromotion(0);
                //on en registre notre objet ds la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($produit);
                $em->flush();

                //on affiche un message flash
                $this->get('session')->getFlashBag()->add('produit', 'Produit bien ajouté');

                //on redirige vers la page de visualisation des Produit
                return $this->redirect($this->generateUrl('odysseus_front_profile_article_ajout_info', array('id' => $produit->getIdProduit())));
            }
        }

        //on affiche sinon le form avec les données entrées
        return $this->render('OdysseusUserBundle:Profile:produit_ajout.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}