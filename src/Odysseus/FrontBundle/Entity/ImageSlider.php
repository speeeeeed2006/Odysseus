<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageSlider
 */
class ImageSlider
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $extension;

    /**
     * @var string
     */
    private $alt;

    /**
     * @var string
     */
    private $tempFileName;


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
     * @return ImageSlider
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
     * @return ImageSlider
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

    /**
     * Set tempFileName
     *
     * @param string $tempFileName
     * @return ImageSlider
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
}
