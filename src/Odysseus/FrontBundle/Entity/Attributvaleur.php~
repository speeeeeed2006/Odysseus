<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attributvaleur
 *
 * @ORM\Table(name="attributvaleur", indexes={@ORM\Index(name="fk_AttributValeur_AttributProduit1_idx", columns={"attribut_produit_id_attribut_produit"})})
 * @ORM\Entity
 */
class Attributvaleur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_attribut_valeur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAttributValeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="nom", type="integer", nullable=true)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="attibut_produit_id", type="integer", nullable=false)
     */
    private $attibutProduitId;

    /**
     * @var \Attributproduit
     *
     * @ORM\ManyToOne(targetEntity="Attributproduit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribut_produit_id_attribut_produit", referencedColumnName="id_attribut_produit")
     * })
     */
    private $attributProduitAttributProduit;



    /**
     * Get idAttributValeur
     *
     * @return integer 
     */
    public function getIdAttributValeur()
    {
        return $this->idAttributValeur;
    }

    /**
     * Set nom
     *
     * @param integer $nom
     * @return Attributvaleur
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
     * Set attibutProduitId
     *
     * @param integer $attibutProduitId
     * @return Attributvaleur
     */
    public function setAttibutProduitId($attibutProduitId)
    {
        $this->attibutProduitId = $attibutProduitId;

        return $this;
    }

    /**
     * Get attibutProduitId
     *
     * @return integer 
     */
    public function getAttibutProduitId()
    {
        return $this->attibutProduitId;
    }

    /**
     * Set attributProduitAttributProduit
     *
     * @param \Odysseus\FrontBundle\Entity\Attributproduit $attributProduitAttributProduit
     * @return Attributvaleur
     */
    public function setAttributProduitAttributProduit(\Odysseus\FrontBundle\Entity\Attributproduit $attributProduitAttributProduit = null)
    {
        $this->attributProduitAttributProduit = $attributProduitAttributProduit;

        return $this;
    }

    /**
     * Get attributProduitAttributProduit
     *
     * @return \Odysseus\FrontBundle\Entity\Attributproduit 
     */
    public function getAttributProduitAttributProduit()
    {
        return $this->attributProduitAttributProduit;
    }
}
