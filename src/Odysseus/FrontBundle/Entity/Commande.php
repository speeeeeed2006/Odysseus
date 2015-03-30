<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="fk_Commande_modePaiement1_idx", columns={"mode_paiement"}), 
 *                                      @ORM\Index(name="fk_Commande_etat1_idx", columns={"etat_id"})
 *                                     })
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="client_ip", type="string", length=45, nullable=false)
     */
    private $clientIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="datetime", nullable=false)
     */
    private $dateCommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_paiement", type="datetime", nullable=false)
     */
    private $datePaiement;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;

    /**
     * @var \Modepaiement
     *
     * @ORM\ManyToOne(targetEntity="Modepaiement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mode_paiement", referencedColumnName="id_mode_paiement")
     * })
     */
    private $modePaiement;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produit", inversedBy="commandeCommande")
     * @ORM\JoinTable(name="commande_has_produit",
     *   joinColumns={
     *     @ORM\JoinColumn(name="commande_id_commande", referencedColumnName="id_commande")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="produit_id_produit", referencedColumnName="id_produit")
     *   }
     * )
     */
    private $produitProduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produitProduit = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idCommande
     *
     * @return integer 
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }
    
    /**
     * Set clientIp
     *
     * @param string $clientIp
     * @return Commande
     */
    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;

        return $this;
    }

    /**
     * Get clientIp
     *
     * @return string 
     */
    public function getClientIp()
    {
        return $this->clientIp;
    }

    /**
     * Set dateCommande
     *
     * @param \DateTime $dateCommande
     * @return Commande
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get dateCommande
     *
     * @return \DateTime 
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set datePaiement
     *
     * @param \DateTime $datePaiement
     * @return Commande
     */
    public function setDatePaiement($datePaiement)
    {
        $this->datePaiement = $datePaiement;

        return $this;
    }

    /**
     * Get datePaiement
     *
     * @return \DateTime 
     */
    public function getDatePaiement()
    {
        return $this->datePaiement;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     * @return Commande
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set modePaiement
     *
     * @param \Odysseus\FrontBundle\Entity\Modepaiement $modePaiement
     * @return Commande
     */
    public function setModePaiement(\Odysseus\FrontBundle\Entity\Modepaiement $modePaiement = null)
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    /**
     * Get modePaiement
     *
     * @return \Odysseus\FrontBundle\Entity\Modepaiement 
     */
    public function getModePaiement()
    {
        return $this->modePaiement;
    }

    /**
     * Set etat
     *
     * @param \Odysseus\FrontBundle\Entity\Etat $etat
     * @return Commande
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
     * Add produitProduit
     *
     * @param \Odysseus\FrontBundle\Entity\Produit $produitProduit
     * @return Commande
     */
    public function addProduitProduit(\Odysseus\FrontBundle\Entity\Produit $produitProduit)
    {
        $this->produitProduit[] = $produitProduit;

        return $this;
    }

    /**
     * Remove produitProduit
     *
     * @param \Odysseus\FrontBundle\Entity\Produit $produitProduit
     */
    public function removeProduitProduit(\Odysseus\FrontBundle\Entity\Produit $produitProduit)
    {
        $this->produitProduit->removeElement($produitProduit);
    }

    /**
     * Get produitProduit
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduitProduit()
    {
        return $this->produitProduit;
    }
    /**
     * @var integer
     */
    private $adresseLivraisonId;

    /**
     * @var integer
     */
    private $adresseFacturationId;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Odysseus\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id_user")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $produitVenteproduitVente;


    /**
     * Set adresseLivraisonId
     *
     * @param integer $adresseLivraisonId
     * @return Commande
     */
    public function setAdresseLivraisonId($adresseLivraisonId)
    {
        $this->adresseLivraisonId = $adresseLivraisonId;

        return $this;
    }

    /**
     * Get adresseLivraisonId
     *
     * @return integer 
     */
    public function getAdresseLivraisonId()
    {
        return $this->adresseLivraisonId;
    }

    /**
     * Set adresseFacturationId
     *
     * @param integer $adresseFacturationId
     * @return Commande
     */
    public function setAdresseFacturationId($adresseFacturationId)
    {
        $this->adresseFacturationId = $adresseFacturationId;

        return $this;
    }

    /**
     * Get adresseFacturationId
     *
     * @return integer 
     */
    public function getAdresseFacturationId()
    {
        return $this->adresseFacturationId;
    }

    /**
     * Add produitVenteproduitVente
     *
     * @param \Odysseus\FrontBundle\Entity\ProduitVente $produitVenteproduitVente
     * @return Commande
     */
    public function addProduitVenteproduitVente(\Odysseus\FrontBundle\Entity\ProduitVente $produitVenteproduitVente)
    {
        $this->produitVenteproduitVente[] = $produitVenteproduitVente;

        return $this;
    }

    /**
     * Remove produitVenteproduitVente
     *
     * @param \Odysseus\FrontBundle\Entity\ProduitVente $produitVenteproduitVente
     */
    public function removeProduitVenteproduitVente(\Odysseus\FrontBundle\Entity\ProduitVente $produitVenteproduitVente)
    {
        $this->produitVenteproduitVente->removeElement($produitVenteproduitVente);
    }

    /**
     * Get produitVenteproduitVente
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduitVenteproduitVente()
    {
        return $this->produitVenteproduitVente;
    }
    function getUser() {
        return $this->user;
    }

    function setUser(\Odysseus\UserBundle\Entity\User $user) {
        $this->user = $user;
    }


}
