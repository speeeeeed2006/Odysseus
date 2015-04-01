<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attributproduit
 *
 * @ORM\Table(name="attributproduit")
 * @ORM\Entity
 */
class Attributproduit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_attribut_produit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAttributProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="categorie_id", type="integer", nullable=true)
     */
    private $categorieId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categorie", mappedBy="attributProduitAttributProduit")
     */
    private $categorieCategorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorieCategorie = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idAttributProduit
     *
     * @return integer 
     */
    public function getIdAttributProduit()
    {
        return $this->idAttributProduit;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Attributproduit
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
     * Set categorieId
     *
     * @param integer $categorieId
     * @return Attributproduit
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
     * Add categorieCategorie
     *
     * @param \Odysseus\FrontBundle\Entity\Categorie $categorieCategorie
     * @return Attributproduit
     */
    public function addCategorieCategorie(\Odysseus\FrontBundle\Entity\Categorie $categorieCategorie)
    {
        $this->categorieCategorie[] = $categorieCategorie;

        return $this;
    }

    /**
     * Remove categorieCategorie
     *
     * @param \Odysseus\FrontBundle\Entity\Categorie $categorieCategorie
     */
    public function removeCategorieCategorie(\Odysseus\FrontBundle\Entity\Categorie $categorieCategorie)
    {
        $this->categorieCategorie->removeElement($categorieCategorie);
    }

    /**
     * Get categorieCategorie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorieCategorie()
    {
        return $this->categorieCategorie;
    }
}
