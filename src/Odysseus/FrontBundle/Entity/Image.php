<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image", indexes={@ORM\Index(name="fk_Image_ProduitVente1_idx", columns={"produit_vente_id"})})
 * @ORM\Entity
 */
class Image
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_image", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idImage;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255, nullable=true)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255, nullable=true)
     */
    private $alt;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="tempFileName", type="string", length=255, nullable=true)
     */
    private $tempfilename;

    /**
     * @var \ProduitVente
     *
     * @ORM\ManyToOne(targetEntity="ProduitVente",  inversedBy="image")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produit_vente_id", referencedColumnName="id_produit_vente", nullable=false)
     * })
     */
    private $produitVente;



    /**
     * Get idImage
     *
     * @return integer 
     */
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Image
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return Image
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set tempfilename
     *
     * @param string $tempfilename
     * @return Image
     */
    public function setTempfilename($tempfilename)
    {
        $this->tempfilename = $tempfilename;

        return $this;
    }

    /**
     * Get tempfilename
     *
     * @return string 
     */
    public function getTempfilename()
    {
        return $this->tempfilename;
    }

    /**
     * Set produitVente
     *
     * @param \Odysseus\FrontBundle\Entity\ProduitVente $produitVente
     * @return Image
     */
    public function setProduitVente(\Odysseus\FrontBundle\Entity\ProduitVente $produitVente = null)
    {
        $this->produitVente = $produitVente;

        return $this;
    }

    /**
     * Get produitVente
     *
     * @return \Odysseus\FrontBundle\Entity\ProduitVente 
     */
    public function getProduitVente()
    {
        return $this->produitVente;
    }
}
