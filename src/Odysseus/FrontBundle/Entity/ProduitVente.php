<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitVente
 */
class ProduitVente
{
    /**
     * @var integer
     */
    private $idProduitVente;

    /**
     * @var integer
     */
    private $stock;

    /**
     * @var \Odysseus\FrontBundle\Entity\Produit
     */
    private $produit;

    /**
     * @var \Odysseus\FrontBundle\Entity\Client
     */
    private $client;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $commandeCommande;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commandeCommande = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idProduitVente
     *
     * @return integer 
     */
    public function getIdProduitVente()
    {
        return $this->idProduitVente;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return ProduitVente
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set produit
     *
     * @param \Odysseus\FrontBundle\Entity\Produit $produit
     * @return ProduitVente
     */
    public function setProduit(\Odysseus\FrontBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Odysseus\FrontBundle\Entity\Produit 
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set client
     *
     * @param \Odysseus\FrontBundle\Entity\Client $client
     * @return ProduitVente
     */
    public function setClient(\Odysseus\FrontBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Odysseus\FrontBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add commandeCommande
     *
     * @param \Odysseus\FrontBundle\Entity\Commande $commandeCommande
     * @return ProduitVente
     */
    public function addCommandeCommande(\Odysseus\FrontBundle\Entity\Commande $commandeCommande)
    {
        $this->commandeCommande[] = $commandeCommande;

        return $this;
    }

    /**
     * Remove commandeCommande
     *
     * @param \Odysseus\FrontBundle\Entity\Commande $commandeCommande
     */
    public function removeCommandeCommande(\Odysseus\FrontBundle\Entity\Commande $commandeCommande)
    {
        $this->commandeCommande->removeElement($commandeCommande);
    }

    /**
     * Get commandeCommande
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommandeCommande()
    {
        return $this->commandeCommande;
    }
}
