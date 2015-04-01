<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blocmodule
 *
 * @ORM\Table(name="blocmodule")
 * @ORM\Entity
 */
class Blocmodule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bloc_module", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBlocModule;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_module", type="string", length=45, nullable=false)
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
