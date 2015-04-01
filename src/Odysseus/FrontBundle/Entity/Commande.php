<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="fk_Commande_modePaiement1_idx", columns={"mode_paiement_id"}), @ORM\Index(name="fk_Commande_User1_idx", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="\Odysseus\FrontBundle\Repository\CommandeRepository");
 */
class Commande
{
    const EN_ATTENTE_PAIEMENT = 'en attente paiement';
    const PAYE = 'payé';
    const EN_LIVRAISON = 'en livraison';
    const LIVRE = 'livré';
    
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
     * @var integer
     *
     * @ORM\Column(name="adresse_livraison_id", type="integer", nullable=false)
     */
    private $adresseLivraisonId;

    /**
     * @var integer
     *
     * @ORM\Column(name="adresse_facturation_id", type="integer", nullable=true)
     */
    private $adresseFacturationId;

    /**
     * @var \Odysseus\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="\Odysseus\UserBundle\Entity\User", inversedBy="commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Modepaiement
     *
     * @ORM\ManyToOne(targetEntity="Modepaiement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mode_paiement_id", referencedColumnName="id_mode_paiement")
     * })
     */
    private $modePaiement;

    /**
     * @var string
     * @ORM\Column(name="etat", type="string", length=45, nullable=false)
     */
    private $etat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ProduitVente", inversedBy="commandeCommande")
     * @ORM\JoinTable(name="commande_has_produit_vente",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Commande_id_commande", referencedColumnName="id_commande")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Produit_Vente_id_Produit_Vente", referencedColumnName="id_produit_vente")
     *   }
     * )
     */
    private $produitVenteProduitVente;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produitVenteProduitVente = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set user
     *
     * @param \Odysseus\UserBundle\Entity\User $user
     * @return Commande
     */
    public function setUser(\Odysseus\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Odysseus\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
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
     * @return Commande
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

    /**
     * Add produitVenteProduitVente
     *
     * @param \Odysseus\FrontBundle\Entity\ProduitVente $produitVenteProduitVente
     * @return Commande
     */
    public function addProduitVenteProduitVente(\Odysseus\FrontBundle\Entity\ProduitVente $produitVenteProduitVente)
    {
        $this->produitVenteProduitVente[] = $produitVenteProduitVente;

        return $this;
    }

    /**
     * Remove produitVenteProduitVente
     *
     * @param \Odysseus\FrontBundle\Entity\ProduitVente $produitVenteProduitVente
     */
    public function removeProduitVenteProduitVente(\Odysseus\FrontBundle\Entity\ProduitVente $produitVenteProduitVente)
    {
        $this->produitVenteProduitVente->removeElement($produitVenteProduitVente);
    }

    /**
     * Get produitVenteProduitVente
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduitVenteProduitVente()
    {
        return $this->produitVenteProduitVente;
    }
}
