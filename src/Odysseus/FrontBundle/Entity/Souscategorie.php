<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Souscategorie
 *
 * @ORM\Table(name="souscategorie", indexes={@ORM\Index(name="fk_SousCategorie_Categorie1_idx", columns={"categorie_id"})})
 * @ORM\Entity
 */
class Souscategorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sous_categorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSousCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="id_categorie")
     * })
     */
    private $categorie;



    /**
     * Get idSousCategorie
     *
     * @return integer 
     */
    public function getIdSousCategorie()
    {
        return $this->idSousCategorie;
    }
    
    /**
     * Set idSousCategorie
     *
     * @param integer $idSousCategorie
     * @return Souscategorie
     */
    function setIdSousCategorie($idSousCategorie) {
        $this->idSousCategorie = $idSousCategorie;
        
        return $this;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Souscategorie
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
     * Set categorie
     *
     * @param \Odysseus\FrontBundle\Entity\Categorie $categorie
     * @return Souscategorie
     */
    public function setCategorie(\Odysseus\FrontBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Odysseus\FrontBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    
    


}
