<?php

namespace Odysseus\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeHasProduitVente
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CommandeHasProduitVente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
   * @ORM\ManyToOne(targetEntity="Odysseus\FrontBundle\Entity\Commande", inversedBy="listeProduit")
   * @ORM\JoinColumn(name="commande_id", referencedColumnName="id_commande", nullable=false)
   */
    private $commande;

     /**
   * @ORM\ManyToOne(targetEntity="Odysseus\FrontBundle\Entity\ProduitVente", inversedBy="commande")
   * @ORM\JoinColumn(name="produitVente_id", referencedColumnName="id_produit_vente", nullable=false)
   */
    private $produitVente;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


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
     * Set commandeId
     *
     * @param integer $commandeId
     *
     * @return CommandeHasProduitVente
     */
    public function setCommandeId($commandeId)
    {
        $this->commandeId = $commandeId;

        return $this;
    }

    /**
     * Get commandeId
     *
     * @return integer
     */
    public function getCommandeId()
    {
        return $this->commandeId;
    }

    /**
     * Set produitVenteId
     *
     * @param integer $produitVenteId
     *
     * @return CommandeHasProduitVente
     */
    public function setProduitVenteId($produitVenteId)
    {
        $this->produitVenteId = $produitVenteId;

        return $this;
    }

    /**
     * Get produitVenteId
     *
     * @return integer
     */
    public function getProduitVenteId()
    {
        return $this->produitVenteId;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return CommandeHasProduitVente
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set commande
     *
     * @param \Odysseus\FrontBundle\Entity\Commande $commande
     *
     * @return CommandeHasProduitVente
     */
    public function setCommande(\Odysseus\FrontBundle\Entity\Commande $commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \Odysseus\FrontBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set produitVente
     *
     * @param \Odysseus\FrontBundle\Entity\ProduitVente $produitVente
     *
     * @return CommandeHasProduitVente
     */
    public function setProduitVente(\Odysseus\FrontBundle\Entity\ProduitVente $produitVente)
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
