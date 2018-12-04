<?php

namespace EventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meeting
 *
 * @ORM\Table(name="meeting", indexes={@ORM\Index(name="id_evenementfk", columns={"id_meeting"}), @ORM\Index(name="id_membre", columns={"id_membre"}), @ORM\Index(name="id_admin", columns={"id_admin"})})
 * @ORM\Entity
 */
class Meeting
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_meeting", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMeeting;

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
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=100, nullable=false)
     */
    private $lieu;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_membre", type="integer", nullable=true)
     */
    private $idMembre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_admin", type="integer", nullable=true)
     */
    private $idAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="confirme", type="string", length=4, nullable=false)
     */
    private $confirme;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_participant", type="integer", nullable=false)
     */
    private $nbreParticipant;



    /**
     * Get idMeeting
     *
     * @return integer
     */
    public function getIdMeeting()
    {
        return $this->idMeeting;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Meeting
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
     * @return Meeting
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
     * @return Meeting
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
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Meeting
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set idMembre
     *
     * @param integer $idMembre
     *
     * @return Meeting
     */
    public function setIdMembre($idMembre)
    {
        $this->idMembre = $idMembre;

        return $this;
    }

    /**
     * Get idMembre
     *
     * @return integer
     */
    public function getIdMembre()
    {
        return $this->idMembre;
    }

    /**
     * Set idAdmin
     *
     * @param integer $idAdmin
     *
     * @return Meeting
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
     * Set confirme
     *
     * @param string $confirme
     *
     * @return Meeting
     */
    public function setConfirme($confirme)
    {
        $this->confirme = $confirme;

        return $this;
    }

    /**
     * Get confirme
     *
     * @return string
     */
    public function getConfirme()
    {
        return $this->confirme;
    }

    /**
     * Set nbreParticipant
     *
     * @param integer $nbreParticipant
     *
     * @return Meeting
     */
    public function setNbreParticipant($nbreParticipant)
    {
        $this->nbreParticipant = $nbreParticipant;

        return $this;
    }

    /**
     * Get nbreParticipant
     *
     * @return integer
     */
    public function getNbreParticipant()
    {
        return $this->nbreParticipant;
    }
}
