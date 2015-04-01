<?php

namespace Odysseus\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Odysseus\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */

class User extends BaseUser
{
    const CIVILITE_H = 'M.';
    const CIVILITE_F = 'Mme';
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", columnDefinition="enum('M.', 'Mme')", nullable=true)
     */
    private $civilite;
    
     /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=45, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="newsletter", type="boolean", nullable=true)
     */
    private $newsletter;

    /**
     * @var boolean
     *
     * @ORM\Column(name="premium", type="boolean", nullable=true)
     */
    private $premium;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=45, nullable=true)
     */
    private $telephone;
    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modification", type="datetime", nullable=true)
     */
    private $dateModification;


    /**
     * @var \Etat
     *
     * @ORM\ManyToOne(targetEntity="Odysseus\FrontBundle\Entity\Etat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etat_id", referencedColumnName="id_etat", nullable=true)
     * })
     */
    private $etat;
    
    /**
     * @ORM\OneToMany(targetEntity="\Odysseus\FrontBundle\Entity\Adresse", mappedBy="user")
     */
    protected $adresse;
    
    /**
     * @ORM\OneToMany(targetEntity="\Odysseus\FrontBundle\Entity\Commande", mappedBy="user")
     */
    protected $commande;
    
    /**  
     * @ORM\OneToMany(targetEntity="\Odysseus\FrontBundle\Entity\Commentaireclient", mappedBy="user")
     */
    protected $commentaireVendeur;
    
    /**
     * @ORM\OneToMany(targetEntity="\Odysseus\FrontBundle\Entity\Commentaireclient", mappedBy="user")
     */
    protected $commentaireAcheteur;
    
    function __construct() {
        parent::__construct();
        $this->adresse = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commande = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaireVendeur = new \Doctrine\Common\Collections\ArrayCollection();;
        $this->commentaireAcheteur = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    function getCommande() {
        return $this->commande;
    }

    function getCommentaireVendeur() {
        return $this->commentaireVendeur;
    }

    function getCommentaireAcheteur() {
        return $this->commentaireAcheteur;
    }

        /**
    *
    * @return string String representation of this class
    */
    public function __toString()
    {
        return (string) $this->id;
    }
    
    function getCivilite() {
        return $this->civilite;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getNom() {
        return $this->nom;
    }

    function getNewsletter() {
        return $this->newsletter;
    }

    function getPremium() {
        return $this->premium;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getDateNaissance() {
        return $this->dateNaissance;
    }

    function getDateCreation() {
        return $this->dateCreation;
    }

    function getDateModification() {
        return $this->dateModification;
    }

    function getEtat() {
        return $this->etat;
    }

    function setCivilite($civilite) {
        $this->civilite = $civilite;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setNewsletter($newsletter) {
        $this->newsletter = $newsletter;
    }

    function setPremium($premium) {
        $this->premium = $premium;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }

    function setDateCreation(\DateTime $dateCreation) {
        $this->dateCreation = $dateCreation;
    }

    function setDateModification(\DateTime $dateModification) {
        $this->dateModification = $dateModification;
    }

    function setEtat(\Odysseus\FrontBundle\Entity\Etat $etat) {
        $this->etat = $etat;
    }
    
    
    function getAdresse() {
        
        return $this->adresse;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add adresse
     *
     * @param \Odysseus\FrontBundle\Entity\Adresse $adresse
     * @return User
     */
    public function addAdresse(\Odysseus\FrontBundle\Entity\Adresse $adresse)
    {
        $this->adresse[] = $adresse;

        return $this;
    }

    /**
     * Remove adresse
     *
     * @param \Odysseus\FrontBundle\Entity\Adresse $adresse
     */
    public function removeAdresse(\Odysseus\FrontBundle\Entity\Adresse $adresse)
    {
        $this->adresse->removeElement($adresse);
    }
}
