<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_categorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alaune", type="boolean", nullable=false)
     */
    private $alaune;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Attributproduit", inversedBy="categorieCategorie")
     * @ORM\JoinTable(name="categorie_has_attributproduit",
     *   joinColumns={
     *     @ORM\JoinColumn(name="categorie_id_categorie", referencedColumnName="id_categorie")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="attribut_produit_id_attribut_produit", referencedColumnName="id_attribut_produit")
     *   }
     * )
     */
    private $attributProduitAttributProduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attributProduitAttributProduit = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idCategorie
     *
     * @return integer 
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Categorie
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
     * Set alaune
     *
     * @param boolean $alaune
     * @return Categorie
     */
    public function setAlaune($alaune)
    {
        $this->alaune = $alaune;

        return $this;
    }

    /**
     * Get alaune
     *
     * @return boolean 
     */
    public function getAlaune()
    {
        return $this->alaune;
    }

    /**
     * Add attributProduitAttributProduit
     *
     * @param \Odysseus\FrontBundle\Entity\Attributproduit $attributProduitAttributProduit
     * @return Categorie
     */
    public function addAttributProduitAttributProduit(\Odysseus\FrontBundle\Entity\Attributproduit $attributProduitAttributProduit)
    {
        $this->attributProduitAttributProduit[] = $attributProduitAttributProduit;

        return $this;
    }

    /**
     * Remove attributProduitAttributProduit
     *
     * @param \Odysseus\FrontBundle\Entity\Attributproduit $attributProduitAttributProduit
     */
    public function removeAttributProduitAttributProduit(\Odysseus\FrontBundle\Entity\Attributproduit $attributProduitAttributProduit)
    {
        $this->attributProduitAttributProduit->removeElement($attributProduitAttributProduit);
    }

    /**
     * Get attributProduitAttributProduit
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttributProduitAttributProduit()
    {
        return $this->attributProduitAttributProduit;
    }
}
