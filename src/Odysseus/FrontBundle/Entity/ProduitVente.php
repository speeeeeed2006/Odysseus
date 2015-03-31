<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitVente
 *
 * @ORM\Table(name="produit_vente", indexes={@ORM\Index(name="IDX_B8164DD8D5E86FF", columns={"etat_id"}), @ORM\Index(name="fk_Produit_Vente_Produit1_idx", columns={"produit_id"}), @ORM\Index(name="fk_Produit_Vente_User1_idx", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="\Odysseus\FrontBundle\Repository\ProduitVenteRepository");
 */
class ProduitVente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_produit_vente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduitVente;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="text", length=255, nullable=true)
     */
    private $remarque;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;

    /**
     * @var \Odysseus\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="\Odysseus\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Etat
     *
     * @ORM\ManyToOne(targetEntity="Etat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etat_id", referencedColumnName="id_etat")
     * })
     */
    private $etat;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produit_id", referencedColumnName="id_produit")
     * })
     */
    private $produit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Commande", mappedBy="produitVenteProduitVente")
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
     * Set remarque
     *
     * @param string $remarque
     * @return ProduitVente
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * Get remarque
     *
     * @return string 
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return ProduitVente
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     * @return ProduitVente
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime 
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set user
     *
     * @param \Odysseus\UserBundle\Entity\User $user
     * @return ProduitVente
     */
    public function setUser(\Odysseus\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Odysseus\FrontBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set etat
     *
     * @param \Odysseus\FrontBundle\Entity\Etat $etat
     * @return ProduitVente
     */
    public function setEtat(\Odysseus\FrontBundle\Entity\Etat $etat = null)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return \Odysseus\FrontBundle\Entity\Etat 
     */
    public function getEtat()
    {
        return $this->etat;
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
