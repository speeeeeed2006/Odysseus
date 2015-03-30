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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Odysseus\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acheteur_user_id", referencedColumnName="id_user")
     * })
     */
    private $acheteurUser;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Odysseus\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vendeur_user_id", referencedColumnName="id_user")
     * })
     */
    private $vendeurUser;


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
     * Set acheteurUser
     *
     * @param \Odysseus\UserBundle\Entity\USer $acheteurUser
     * @return Commentaireclient
     */
    public function setAcheteurUser(\Odysseus\UserBundle\Entity\User $acheteurUser = null)
    {
        $this->acheteurUser = $acheteurUser;

        return $this;
    }

    /**
     * Get acheteurUser
     *
     * @return \Odysseus\UserBundle\Entity\User 
     */
    public function getAcheteurUser()
    {
        return $this->acheteurUser;
    }

    /**
     * Set vendeurUser
     *
     * @param \Odysseus\UserBundle\Entity\User $vendeurUser
     * @return Commentaireclient
     */
    public function setVendeurUser(\Odysseus\UserBundle\Entity\Client $vendeurUser = null)
    {
        $this->vendeurUser = $vendeurUser;

        return $this;
    }

    /**
     * Get vendeurUser
     *
     * @return \Odysseus\UserBundle\Entity\User 
     */
    public function getVendeurUser()
    {
        return $this->vendeurUser;
    }
}
