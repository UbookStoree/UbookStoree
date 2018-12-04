<?php

namespace AchatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneCommande
 *
 * @ORM\Table(name="ligne_commande", indexes={@ORM\Index(name="Lcommande_ibfk_1", columns={"idCommandeFk"}), @ORM\Index(name="Lcommande_ibfk_2", columns={"idLivreFk"})})
 * @ORM\Entity(repositoryClass="AchatBundle\Repository\CommandeRepository")
 * @ORM\Entity(repositoryClass="AchatBundle\Repository\LigneCommandeRepository")

 */
class LigneCommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idLigneCommande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlignecommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCommandeFk", referencedColumnName="idCommande")
     * })
     */
    private $idcommandefk;

    /**
     * @var \LivreOccasion
     *
     * @ORM\ManyToOne(targetEntity="LivreOccasion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLivreFk", referencedColumnName="id_livre")
     * })
     */
    private $idlivrefk;



    /**
     * Get idlignecommande
     *
     * @return integer
     */
    public function getIdlignecommande()
    {
        return $this->idlignecommande;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return LigneCommande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set idcommandefk
     *
     * @param \AchatBundle\Entity\Commande $idcommandefk
     *
     * @return LigneCommande
     */
    public function setIdcommandefk(\AchatBundle\Entity\Commande $idcommandefk = null)
    {
        $this->idcommandefk = $idcommandefk;

        return $this;
    }

    /**
     * Get idcommandefk
     *
     * @return \AchatBundle\Entity\Commande
     */
    public function getIdcommandefk()
    {
        return $this->idcommandefk;
    }

    /**
     * Set idlivrefk
     *
     * @param \AchatBundle\Entity\LivreOccasion $idlivrefk
     *
     * @return LigneCommande
     */
    public function setIdlivrefk(\AchatBundle\Entity\LivreOccasion $idlivrefk = null)
    {
        $this->idlivrefk = $idlivrefk;

        return $this;
    }

    /**
     * Get idlivrefk
     *
     * @return \AchatBundle\Entity\LivreOccasion
     */
    public function getIdlivrefk()
    {
        return $this->idlivrefk;
    }
}
