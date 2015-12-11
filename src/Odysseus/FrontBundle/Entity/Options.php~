<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table(name="options")
 * @ORM\Entity
 */
class Options
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_option", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOption;

    /**
     * @var string
     *
     * @ORM\Column(name="attribut", type="string", length=45, nullable=false)
     */
    private $attribut;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valeur", type="boolean", nullable=false)
     */
    private $valeur;



    /**
     * Get idOption
     *
     * @return integer 
     */
    public function getIdOption()
    {
        return $this->idOption;
    }

    /**
     * Set attribut
     *
     * @param string $attribut
     * @return Options
     */
    public function setAttribut($attribut)
    {
        $this->attribut = $attribut;

        return $this;
    }

    /**
     * Get attribut
     *
     * @return string 
     */
    public function getAttribut()
    {
        return $this->attribut;
    }

    /**
     * Set valeur
     *
     * @param boolean $valeur
     * @return Options
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return boolean 
     */
    public function getValeur()
    {
        return $this->valeur;
    }
}
