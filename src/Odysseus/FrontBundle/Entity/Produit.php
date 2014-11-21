<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="fk_Produit_SousCategorie1_idx", columns={"sous_categorie_id"}), @ORM\Index(name="fk_Produit_Etat1_idx", columns={"etat_id"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=40, nullable=false)
     */
    private $reference;

    /**
     * @var integer
     *
     * @ORM\Column(name="nom", type="integer", nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var integer
     *
     * @ORM\Column(name="categorie_id", type="integer", nullable=false)
     */
    private $categorieId;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=45, nullable=false)
     */
    private $image;

    /**
     * @var \Souscategorie
     *
     * @ORM\ManyToOne(targetEntity="Souscategorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sous_categorie_id", referencedColumnName="id_sous_categorie")
     * })
     */
    private $sousCategorie;

    /**
     * @var \Etat
     *
     * @ORM\ManyToOne(targetEntity="Etat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etat_id", referencedColumnName="id_etat")
     * })
     */
    private $etat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Commande", mappedBy="produitProduit")
     */
    private $commandeCommande;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commandeCommande = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idProduit
     *
     * @return integer 
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set nom
     *
     * @param integer $nom
     * @return Produit
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return integer 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Produit
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set categorieId
     *
     * @param integer $categorieId
     * @return Produit
     */
    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    /**
     * Get categorieId
     *
     * @return integer 
     */
    public function getCategorieId()
    {
        return $this->categorieId;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Produit
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set sousCategorie
     *
     * @param \Odysseus\FrontBundle\Entity\Souscategorie $sousCategorie
     * @return Produit
     */
    public function setSousCategorie(\Odysseus\FrontBundle\Entity\Souscategorie $sousCategorie = null)
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    /**
     * Get sousCategorie
     *
     * @return \Odysseus\FrontBundle\Entity\Souscategorie 
     */
    public function getSousCategorie()
    {
        return $this->sousCategorie;
    }

    /**
     * Set etat
     *
     * @param \Odysseus\FrontBundle\Entity\Etat $etat
     * @return Produit
     */
    public function setEtat(\Odysseus\FrontBundle\Entity\Etat $etat = null)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return \Odysseus\FrontBundle\Entity\Etat 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Add commandeCommande
     *
     * @param \Odysseus\FrontBundle\Entity\Commande $commandeCommande
     * @return Produit
     */
    public function addCommandeCommande(\Odysseus\FrontBundle\Entity\Commande $commandeCommande)
    {
        $this->commandeCommande[] = $commandeCommande;

        return $this;
    }

    /**
     * Remove commandeCommande
     *
     * @param \Odysseus\FrontBundle\Entity\Commande $commandeCommande
     */
    public function removeCommandeCommande(\Odysseus\FrontBundle\Entity\Commande $commandeCommande)
    {
        $this->commandeCommande->removeElement($commandeCommande);
    }

    /**
     * Get commandeCommande
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommandeCommande()
    {
        return $this->commandeCommande;
    }
}
