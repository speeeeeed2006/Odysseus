<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Image
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\ImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Image
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idImage;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    private $file;
    
    private $tempFileName;
    
    /**
     * @var \ProduitVente
     *
     * @ORM\ManyToOne(targetEntity="ProduitVente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produitVente_id", referencedColumnName="id_produit_vente")
     * })
     */
    private $produitVente;

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
     * Set extension
     *
     * @param string $extension
     * @return Image
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }
    
    
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
        
        //on vérifie si on avait déja un fichier pour cette entité
        if(null !== $this->extension){
            //on sauvegarde l'extension du fichier pour la supprimer plus tard
            $this->tempFileName = $this->extension;
            //on réinitiale les valeurs des attributs
            $this->extension = null;
            $this->alt = null;
        }
    }
    
    
   
    public function getFile()
    {
        return $this->file;
    }
    
    /**
    * @ORM\PrePersist()
    * @ORM\PreUpdate()
    */
    public function preUpload()
    {
        //champ facultatif
        if(null === $this->file)
            return;
        
       //le nom du fichier est son id, il faut juste stocker son extension 
        $this->extension = $this->file->guessExtension();
        
        //on garde le nom original du fichier de l'internaute
        $this->alt = $this->file->getClientOriginalName();
    }
    
    /**
    * @ORM\PostPersist()
    * @ORM\PostUpdate()
    */
    public function upload()
    {
        //champ facultatif
        if(null === $this->file)
            return;
        
        //si on avait un ancien fichier on le supprime
        if(null !== $this->tempFileName){
           $oldFile = $this->getUploadRootDir(). '/' . $this->id . '.'. $this->tempFileName;
            if(file_exists($oldFile)) {
                unlink($oldFile);
            }
        }
       
        //on déplace le fichier envoyé dans le répertoire de notre choix avec le nom de fichier à créer
        $this->file->move($this->getUploadRootDir(), $this->id.'.'. $this->extension);    
    }
    
    /**
    * @ORM\PreRemove()
    */
    public function preRemoveUpload()
    {   
        //on sauvegarde  temporairement le nom du fichier car il dépend de l'id
        $this->tempFileName = $this->getUploadRootDir(). '/' . $this->id . '.'. $this->extension;     
    }
    
    /**
    * @ORM\PostRemove()
    */
    public function removeUpload()
    {
        //on n'a pas accès à l'id, on utilise notre nom sauv 
        if(file_exists($this->tempFileName))
            //on supprime le fichier
            unlink($this->tempFileName);    
    } 
    
    public function getUploadDir()
    {
        //on retourne le chemin relatif vers l'img pour le nav
        return 'uploads/img';
    }
    
    public function getUploadRootDir()
    {
        //on retorune le chemin relatif vers l'img pour le code PHP
        return __DIR__.'/../../../../web/'. $this->getUploadDir();
    }
    
    public function getWebPath()
    {
       return $this->getUploadDir().'/'.$this->getId(). '.' . $this->getExtension();
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
     * Set tempFileName
     *
     * @param string $tempFileName
     * @return Image
     */
    public function setTempFileName($tempFileName)
    {
        $this->tempFileName = $tempFileName;

        return $this;
    }

    /**
     * Get tempFileName
     *
     * @return string 
     */
    public function getTempFileName()
    {
        return $this->tempFileName;
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
