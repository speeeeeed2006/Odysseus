<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 */
class Options
{
    /**
     * @var integer
     */
    private $idOption;

    /**
     * @var string
     */
    private $attribut;

    /**
     * @var boolean
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
