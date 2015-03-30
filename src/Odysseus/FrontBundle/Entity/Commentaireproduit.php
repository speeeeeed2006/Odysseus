<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaireproduit
 */
class Commentaireproduit
{
    /**
     * @var integer
     */
    private $idCommentaireProduit;

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
     * @var \Odysseus\FrontBundle\Entity\Produit
     */
    private $produit;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Odysseus\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vendeur_user_id", referencedColumnName="id_user")
     * })
     */
    private $user;


    /**
     * Get idCommentaireProduit
     *
     * @return integer 
     */
    public function getIdCommentaireProduit()
    {
        return $this->idCommentaireProduit;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return Commentaireproduit
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
     * @return Commentaireproduit
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
     * @return Commentaireproduit
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
     * @return Commentaireproduit
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
     * Set produit
     *
     * @param \Odysseus\FrontBundle\Entity\Produit $produit
     * @return Commentaireproduit
     */
    public function setProduit(\Odysseus\FrontBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Odysseus\FrontBundle\Entity\Produit 
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set user
     *
     * @param \Odysseus\UserBundle\Entity\User $user
     * @return Commentaireproduit
     */
    public function setUser(\Odysseus\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Odysseus\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
