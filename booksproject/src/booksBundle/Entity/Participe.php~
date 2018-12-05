<?php

namespace EventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participe
 *
 * @ORM\Table(name="participe", indexes={@ORM\Index(name="id_participant", columns={"id_participant"}), @ORM\Index(name="id_meeting", columns={"id_meeting"})})
 * @ORM\Entity
 */
class Participe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_participation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParticipation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_participant", type="integer", nullable=false)
     */
    private $idParticipant;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_meeting", type="integer", nullable=false)
     */
    private $idMeeting;



    /**
     * Get idParticipation
     *
     * @return integer
     */
    public function getIdParticipation()
    {
        return $this->idParticipation;
    }

    /**
     * Set idParticipant
     *
     * @param integer $idParticipant
     *
     * @return Participe
     */
    public function setIdParticipant($idParticipant)
    {
        $this->idParticipant = $idParticipant;

        return $this;
    }

    /**
     * Get idParticipant
     *
     * @return integer
     */
    public function getIdParticipant()
    {
        return $this->idParticipant;
    }

    /**
     * Set idMeeting
     *
     * @param integer $idMeeting
     *
     * @return Participe
     */
    public function setIdMeeting($idMeeting)
    {
        $this->idMeeting = $idMeeting;

        return $this;
    }

    /**
     * Get idMeeting
     *
     * @return integer
     */
    public function getIdMeeting()
    {
        return $this->idMeeting;
    }
}
