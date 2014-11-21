<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etat
 *
 * @ORM\Table(name="etat")
 * @ORM\Entity
 */
class Etat
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="id_etat", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEtat;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;



    /**
     * Get idEtat
     *
     * @return boolean 
     */
    public function getIdEtat()
    {
        return $this->idEtat;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Etat
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
}
