<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blocmodule
 */
class Blocmodule
{
    /**
     * @var integer
     */
    private $idBlocModule;

    /**
     * @var string
     */
    private $nomModule;


    /**
     * Get idBlocModule
     *
     * @return integer 
     */
    public function getIdBlocModule()
    {
        return $this->idBlocModule;
    }

    /**
     * Set nomModule
     *
     * @param string $nomModule
     * @return Blocmodule
     */
    public function setNomModule($nomModule)
    {
        $this->nomModule = $nomModule;

        return $this;
    }

    /**
     * Get nomModule
     *
     * @return string 
     */
    public function getNomModule()
    {
        return $this->nomModule;
    }
}
