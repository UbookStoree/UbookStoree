<?php

namespace EventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="id_ebook", columns={"id_ebook"}), @ORM\Index(name="id_admin", columns={"id_admin"}), @ORM\Index(name="id_evenement", columns={"id_offre"}), @ORM\Index(name="id_evenementfk", columns={"id_offre"})})
 * @ORM\Entity
 */
class Offre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage_remise", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentageRemise;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ebook", type="integer", nullable=false)
     */
    private $idEbook;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_admin", type="integer", nullable=false)
     */
    private $idAdmin;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_initial", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;



    /**
     * Get idOffre
     *
     * @return integer
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Offre
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Offre
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set pourcentageRemise
     *
     * @param float $pourcentageRemise
     *
     * @return Offre
     */
    public function setPourcentageRemise($pourcentageRemise)
    {
        $this->pourcentageRemise = $pourcentageRemise;

        return $this;
    }

    /**
     * Get pourcentageRemise
     *
     * @return float
     */
    public function getPourcentageRemise()
    {
        return $this->pourcentageRemise;
    }

    /**
     * Set idEbook
     *
     * @param integer $idEbook
     *
     * @return Offre
     */
    public function setIdEbook($idEbook)
    {
        $this->idEbook = $idEbook;

        return $this;
    }

    /**
     * Get idEbook
     *
     * @return integer
     */
    public function getIdEbook()
    {
        return $this->idEbook;
    }

    /**
     * Set idAdmin
     *
     * @param integer $idAdmin
     *
     * @return Offre
     */
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }

    /**
     * Get idAdmin
     *
     * @return integer
     */
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * Set prixInitial
     *
     * @param float $prixInitial
     *
     * @return Offre
     */
    public function setPrixInitial($prixInitial)
    {
        $this->prixInitial = $prixInitial;

        return $this;
    }

    /**
     * Get prixInitial
     *
     * @return float
     */
    public function getPrixInitial()
    {
        return $this->prixInitial;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Offre
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
