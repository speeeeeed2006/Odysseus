<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attributvaleur
 *
 * @ORM\Table(name="attributvaleur", indexes={@ORM\Index(name="fk_AttributValeur_AttributProduit1_idx", columns={"attribut_produit_id"})})
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var \Attributproduit
     *
     * @ORM\ManyToOne(targetEntity="Attributproduit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribut_produit_id", referencedColumnName="id_attribut_produit")
     * })
     */
    private $attributProduit;



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
     * @param string $nom
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
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set attributProduit
     *
     * @param \Odysseus\FrontBundle\Entity\Attributproduit $attributProduit
     * @return Attributvaleur
     */
    public function setAttributProduit(\Odysseus\FrontBundle\Entity\Attributproduit $attributProduit = null)
    {
        $this->attributProduit = $attributProduit;

        return $this;
    }

    /**
     * Get attributProduit
     *
     * @return \Odysseus\FrontBundle\Entity\Attributproduit 
     */
    public function getAttributProduit()
    {
        return $this->attributProduit;
    }
}
