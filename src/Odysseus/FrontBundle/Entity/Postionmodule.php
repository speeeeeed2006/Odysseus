<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Postionmodule
 */
class Postionmodule
{
    /**
     * @var integer
     */
    private $idPosition;

    /**
     * @var integer
     */
    private $positionVerticale;

    /**
     * @var integer
     */
    private $largeurModule;

    /**
     * @var string
     */
    private $action;

    /**
     * @var boolean
     */
    private $publie;

    /**
     * @var \Odysseus\FrontBundle\Entity\Blocmodule
     */
    private $blocModule;


    /**
     * Get idPosition
     *
     * @return integer 
     */
    public function getIdPosition()
    {
        return $this->idPosition;
    }

    /**
     * Set positionVerticale
     *
     * @param integer $positionVerticale
     * @return Postionmodule
     */
    public function setPositionVerticale($positionVerticale)
    {
        $this->positionVerticale = $positionVerticale;

        return $this;
    }

    /**
     * Get positionVerticale
     *
     * @return integer 
     */
    public function getPositionVerticale()
    {
        return $this->positionVerticale;
    }

    /**
     * Set largeurModule
     *
     * @param integer $largeurModule
     * @return Postionmodule
     */
    public function setLargeurModule($largeurModule)
    {
        $this->largeurModule = $largeurModule;

        return $this;
    }

    /**
     * Get largeurModule
     *
     * @return integer 
     */
    public function getLargeurModule()
    {
        return $this->largeurModule;
    }

    /**
     * Set action
     *
     * @param string $action
     * @return Postionmodule
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set publie
     *
     * @param boolean $publie
     * @return Postionmodule
     */
    public function setPublie($publie)
    {
        $this->publie = $publie;

        return $this;
    }

    /**
     * Get publie
     *
     * @return boolean 
     */
    public function getPublie()
    {
        return $this->publie;
    }

    /**
     * Set blocModule
     *
     * @param \Odysseus\FrontBundle\Entity\Blocmodule $blocModule
     * @return Postionmodule
     */
    public function setBlocModule(\Odysseus\FrontBundle\Entity\Blocmodule $blocModule = null)
    {
        $this->blocModule = $blocModule;

        return $this;
    }

    /**
     * Get blocModule
     *
     * @return \Odysseus\FrontBundle\Entity\Blocmodule 
     */
    public function getBlocModule()
    {
        return $this->blocModule;
    }
}
