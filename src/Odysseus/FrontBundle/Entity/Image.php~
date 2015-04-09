<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Image
 * @ORM\Table(name="image")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="\Odysseus\FrontBundle\Repository\ImageRepository")
 */
class Image
{
    const ACTIVEE = 'activée';
    const DESACTIVEE = 'désactivée';

    /**
     * @var integer
     *
     * @ORM\Column(name="id_image", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idImage;


        /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\NotBlank
     */
    private $nom;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var string
     * @ORM\Column(name="etat", type="string", length=45, nullable=false)
     */
    private $etat;

    /**
     * @var \ProduitVente
     *
     * @ORM\OneToOne(targetEntity="ProduitVente", inversedBy="image")
     * @ORM\JoinColumn(name="produitVente_id", referencedColumnName="id_produit_vente")
     */
    private $produitVente;


    public function __construct(){

    }


    private $filenameForRemove;

     public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
    }

       /**
     * Set etat
     *
     * @return Image
     */
    public function setEtat($value)
    {
        $this->etat = $value;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }




    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()  //OK
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir() //
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/imageArticle';
    }


    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() //OK
    {
        if (null !== $this->file) {
            $this->path = $this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() //OK
    {
        if (null === $this->file) {
            return;
        }

        // s'il y a une erreur lors du déplacement du fichier, une exception
        // va automatiquement être lancée par la méthode move(). Cela va empêcher
        // proprement l'entité d'être persistée dans la base de données si
        // erreur il y a
        $this->file->move($this->getUploadRootDir(), $this->idImage.'.'.$this->file->guessExtension());
        unset($this->file);
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove() //OK
    {
        $this->filenameForRemove = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() //OK
    {
        if ($this->filenameForRemove) {
            unlink($this->filenameForRemove);
        }
    }

    public function getAbsolutePath() //OK
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->idImage.'.'.$this->path;
    }

    /**
     * Get idImage
     *
     * @return integer
     */
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * Set produitVente
     *
     * @param \Odysseus\FrontBundle\Entity\ProduitVente $produitVente
     * @return Image
     */
    public function setProduitVente(\Odysseus\FrontBundle\Entity\ProduitVente $produitVente = null)
    {
        $this->produitVente = $produitVente;
        return $this;
    }
    /**
     * Get produitVente
     *
     * @return \Odysseus\FrontBundle\Entity\ProduitVente
     */
    public function getProduitVente()
    {
        return $this->produitVente;
    }
}
