<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Etat
 *
 * @ORM\Table(name="etat")
 * @ORM\Entity(repositoryClass="\Odysseus\FrontBundle\Repository\EtatRepository");
 */
class Etat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_etat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEtat;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=false)
     */
    private $type;
    
    /**
     * @ORM\OneToMany(targetEntity="\Odysseus\FrontBundle\Entity\Commande", mappedBy="etat")
     */
    protected $commande;

    /**
     * @ORM\OneToMany(targetEntity="\Odysseus\FrontBundle\Entity\Adresse", mappedBy="etat")
     */
    protected $adresse;
    
    /**
     * @ORM\OneToMany(targetEntity="\Odysseus\FrontBundle\Entity\Produit", mappedBy="etat")
     */
    protected $produit;
    
    /**
     * @ORM\OneToMany(targetEntity="\Odysseus\FrontBundle\Entity\ProduitVente", mappedBy="etat")
     */
    protected $produitVente;
    
    /**
     * @ORM\OneToMany(targetEntity="\Odysseus\FrontBundle\Entity\ImageSlider", mappedBy="etat")
     */
    protected $imageSlider;
    
    /**
     * Constructor
     */
    function __construct() {
        $this->commande = new ArrayCollection();
        $this->adresse = new ArrayCollection();
        $this->produit = new ArrayCollection();
        $this->produitVente = new ArrayCollection();
        $this->imageSlider = new \Doctrine\Common\Collections\ArrayCollection();
    }

        /**
     * Get idEtat
     *
     * @return integer 
     */
    public function getIdEtat()
    {
        return $this->idEtat;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Etat
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Etat
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add commande
     *
     * @param \Odysseus\FrontBundle\Entity\Commande $commande
     * @return Etat
     */
    public function addCommande(\Odysseus\FrontBundle\Entity\Commande $commande)
    {
        $this->commande[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \Odysseus\FrontBundle\Entity\Commande $commande
     */
    public function removeCommande(\Odysseus\FrontBundle\Entity\Commande $commande)
    {
        $this->commande->removeElement($commande);
    }

    /**
     * Get commande
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Add adresse
     *
     * @param \Odysseus\FrontBundle\Entity\Adresse $adresse
     * @return Etat
     */
    public function addAdresse(\Odysseus\FrontBundle\Entity\Adresse $adresse)
    {
        $this->adresse[] = $adresse;

        return $this;
    }

    /**
     * Remove adresse
     *
     * @param \Odysseus\FrontBundle\Entity\Adresse $adresse
     */
    public function removeAdresse(\Odysseus\FrontBundle\Entity\Adresse $adresse)
    {
        $this->adresse->removeElement($adresse);
    }

    /**
     * Get adresse
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Add produit
     *
     * @param \Odysseus\FrontBundle\Entity\Produit $produit
     * @return Etat
     */
    public function addProduit(\Odysseus\FrontBundle\Entity\Produit $produit)
    {
        $this->produit[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \Odysseus\FrontBundle\Entity\Produit $produit
     */
    public function removeProduit(\Odysseus\FrontBundle\Entity\Produit $produit)
    {
        $this->produit->removeElement($produit);
    }

    /**
     * Get produit
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Add produitVente
     *
     * @param \Odysseus\FrontBundle\Entity\ProduitVente $produitVente
     * @return Etat
     */
    public function addProduitVente(\Odysseus\FrontBundle\Entity\ProduitVente $produitVente)
    {
        $this->produitVente[] = $produitVente;

        return $this;
    }

    /**
     * Remove produitVente
     *
     * @param \Odysseus\FrontBundle\Entity\ProduitVente $produitVente
     */
    public function removeProduitVente(\Odysseus\FrontBundle\Entity\ProduitVente $produitVente)
    {
        $this->produitVente->removeElement($produitVente);
    }

    /**
     * Get produitVente
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduitVente()
    {
        return $this->produitVente;
    }

    /**
     * Add imageSlider
     *
     * @param \Odysseus\FrontBundle\Entity\ImageSlider $imageSlider
     * @return Etat
     */
    public function addImageSlider(\Odysseus\FrontBundle\Entity\ImageSlider $imageSlider)
    {
        $this->imageSlider[] = $imageSlider;

        return $this;
    }

    /**
     * Remove imageSlider
     *
     * @param \Odysseus\FrontBundle\Entity\ImageSlider $imageSlider
     */
    public function removeImageSlider(\Odysseus\FrontBundle\Entity\ImageSlider $imageSlider)
    {
        $this->imageSlider->removeElement($imageSlider);
    }

    /**
     * Get imageSlider
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImageSlider()
    {
        return $this->imageSlider;
    }
}
