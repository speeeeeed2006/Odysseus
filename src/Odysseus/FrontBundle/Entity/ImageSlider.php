<?php
namespace Odysseus\FrontBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Odysseus\FrontBundle\Entity\Etat;
/**
 * ImageSlider
 *
 * @ORM\Table(name="image_slider")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="\Odysseus\FrontBundle\Repository\ImageSliderRepository")
 */
class ImageSlider
{
    
    const ACTIVEE = 'activée';
    const DESACTIVEE = 'désactivée';
    /**
     * @var integer
     *
     * @ORM\Column(name="id_image_slider", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idImageSlider;
   
        /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\NotBlank
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    //private $alt;
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;
    
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
    
    
    public function __construct(){
        
        
        
    }
   
    
    // propriété utilisé temporairement pour la suppression
    private $filenameForRemove;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getIdImageSlider()
    {
        return $this->idImageSlider;
    }
    
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
     * @return ImageSlider
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
        return 'uploads/slider';
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
        $this->file->move($this->getUploadRootDir(), $this->idImageSlider.'.'.$this->file->guessExtension());
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
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->idImageSlider.'.'.$this->path;
    }
    /**
     * Set filenameForRemove
     *
     * @param \Odysseus\FrontBundle\Entity\Etat $filenameForRemove
     * @return ImageSlider
     */
    public function setFilenameForRemove(\Odysseus\FrontBundle\Entity\Etat $filenameForRemove = null)
    {
        $this->filenameForRemove = $filenameForRemove;
        return $this;
    }
    /**
     * Get filenameForRemove
     *
     * @return \Odysseus\FrontBundle\Entity\Etat 
     */
    public function getFilenameForRemove()
    {
        return $this->filenameForRemove;
    }
}
