<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaireclient
 *
 * @ORM\Table(name="commentaireclient", indexes={@ORM\Index(name="IDX_C8F020D57DF81F10", columns={"vendeur_user_id"}), @ORM\Index(name="fk_CommentaireClient_User1_idx", columns={"acheteur_user_id"})})
 * @ORM\Entity
 */
class Commentaireclient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commentaire_client", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommentaireClient;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text", length=65535, nullable=false)
     */
    private $texte;

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float", precision=10, scale=0, nullable=false)
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=false)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modification", type="datetime", nullable=false)
     */
    private $dateModification;

    /**
     * @var \Odysseus\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="\Odysseus\UserBundle\Entity\User", inversedBy="commentaireVendeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vendeur_user_id", referencedColumnName="id")
     * })
     */
    private $vendeurUser;

    /**
     * @var \Odysseus\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="\Odysseus\UserBundle\Entity\User", inversedBy="commentaireAcheteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acheteur_user_id", referencedColumnName="id")
     * })
     */
    private $acheteurUser;



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
     * Set vendeurUser
     *
     * @param \Odysseus\UserBundle\Entity\User $vendeurUser
     * @return Commentaireclient
     */
    public function setVendeurUser(\Odysseus\UserBundle\Entity\User $vendeurUser = null)
    {
        $this->vendeurUser = $vendeurUser;

        return $this;
    }

    /**
     * Get vendeurUser
     *
     * @return \Odysseus\FrontBundle\Entity\User 
     */
    public function getVendeurUser()
    {
        return $this->vendeurUser;
    }

    /**
     * Set acheteurUser
     *
     * @param \Odysseus\UserBundle\Entity\User $acheteurUser
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
     * @return \Odysseus\FrontBundle\Entity\User 
     */
    public function getAcheteurUser()
    {
        return $this->acheteurUser;
    }
}
