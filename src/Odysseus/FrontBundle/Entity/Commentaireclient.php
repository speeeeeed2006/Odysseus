<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaireclient
 */
class Commentaireclient
{
    /**
     * @var integer
     */
    private $idCommentaireClient;

    /**
     * @var string
     */
    private $texte;

    /**
     * @var float
     */
    private $note;

    /**
     * @var \DateTime
     */
    private $dateCreation;

    /**
     * @var \DateTime
     */
    private $dateModification;

    /**
     * @var \Odysseus\FrontBundle\Entity\Client
     */
    private $acheteurClient;

    /**
     * @var \Odysseus\FrontBundle\Entity\Client
     */
    private $vendeurClient;


    /**
     * Get idCommentaireClient
     *
     * @return integer 
     */
    public function getIdCommentaireClient()
    {
        return $this->idCommentaireClient;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return Commentaireclient
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set note
     *
     * @param float $note
     * @return Commentaireclient
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return float 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Commentaireclient
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     * @return Commentaireclient
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set acheteurClient
     *
     * @param \Odysseus\FrontBundle\Entity\Client $acheteurClient
     * @return Commentaireclient
     */
    public function setAcheteurClient(\Odysseus\FrontBundle\Entity\Client $acheteurClient = null)
    {
        $this->acheteurClient = $acheteurClient;

        return $this;
    }

    /**
     * Get acheteurClient
     *
     * @return \Odysseus\FrontBundle\Entity\Client 
     */
    public function getAcheteurClient()
    {
        return $this->acheteurClient;
    }

    /**
     * Set vendeurClient
     *
     * @param \Odysseus\FrontBundle\Entity\Client $vendeurClient
     * @return Commentaireclient
     */
    public function setVendeurClient(\Odysseus\FrontBundle\Entity\Client $vendeurClient = null)
    {
        $this->vendeurClient = $vendeurClient;

        return $this;
    }

    /**
     * Get vendeurClient
     *
     * @return \Odysseus\FrontBundle\Entity\Client 
     */
    public function getVendeurClient()
    {
        return $this->vendeurClient;
    }
}
