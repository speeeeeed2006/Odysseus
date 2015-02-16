<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administrateur
 *
 * @ORM\Table(name="administrateur")
 * @ORM\Entity
 */
class Administrateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_administrateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdministrateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=45, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_super_admin", type="boolean", nullable=false)
     */
    private $estSuperAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=32, nullable=true)
     */
    private $mdp;



    /**
     * Get idAdministrateur
     *
     * @return integer 
     */
    public function getIdAdministrateur()
    {
        return $this->idAdministrateur;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Administrateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Administrateur
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

    /**
     * Set email
     *
     * @param string $email
     * @return Administrateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set estSuperAdmin
     *
     * @param boolean $estSuperAdmin
     * @return Administrateur
     */
    public function setEstSuperAdmin($estSuperAdmin)
    {
        $this->estSuperAdmin = $estSuperAdmin;

        return $this;
    }

    /**
     * Get estSuperAdmin
     *
     * @return boolean 
     */
    public function getEstSuperAdmin()
    {
        return $this->estSuperAdmin;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return Administrateur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
    }
}
