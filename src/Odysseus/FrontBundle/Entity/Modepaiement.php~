<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modepaiement
 *
 * @ORM\Table(name="modepaiement")
 * @ORM\Entity
 */
class Modepaiement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_mode_paiement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModePaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;



    /**
     * Get idModePaiement
     *
     * @return boolean 
     */
    public function getIdModePaiement()
    {
        return $this->idModePaiement;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Modepaiement
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
