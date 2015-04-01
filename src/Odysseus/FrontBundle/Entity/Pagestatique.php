<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pagestatique
 *
 * @ORM\Table(name="pagestatique")
 * @ORM\Entity(repositoryClass="\Odysseus\FrontBundle\Repository\PageStatiqueRepository")
 */
class Pagestatique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_page_statique", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPageStatique;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", nullable=false)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;



    /**
     * Get idPageStatique
     *
     * @return integer 
     */
    public function getIdPageStatique()
    {
        return $this->idPageStatique;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Pagestatique
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Pagestatique
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Pagestatique
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
