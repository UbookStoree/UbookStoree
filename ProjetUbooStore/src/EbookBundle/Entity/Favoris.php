<?php

namespace EbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;



/**
 * Favoris
 *
 * @ORM\Table(name="favoris")
 * @ORM\Entity(repositoryClass="EbookBundle\Repository\FavorisRepository")
 */
class Favoris
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var \AppBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id", nullable=true)
     * })
     */
    private $id_user;

    /**
     * @var \EbookBundle\Entity\Ebook
     *
     * @ORM\ManyToOne(targetEntity="EbookBundle\Entity\Ebook")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_Ebook", referencedColumnName="id")
     *})
     */
    private $id_Ebook;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Auteur", type="string", length=255, nullable=false)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="Resumer", type="string", length=500, nullable=false)
     */
    private $resumer;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255, nullable=false)
     */


    /**
     * @var string
     * @ORM\Column(name="typeEbook", type="string", length=255, nullable=false)
     */
    private $typeEbook;
    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;


    /**
     *  @var string
     * @ORM\Column(name="nomImage",type="string",length=255,nullable=false)
     */
    private $nomImage;




    public function getId()
    {
        return $this->id;
    }


    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Favoris
     */
    public function setIdUser(\AppBundle\Entity\User $idUser )
    {
        $this->id_user = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set idEbook
     *
     * @param \EbookBundle\Entity\Ebook $idEbook
     *
     * @return Favoris
     */
    public function setIdEbook(\EbookBundle\Entity\Ebook $idEbook = null)
    {
        $this->id_Ebook = $idEbook;

        return $this;
    }

    /**
     * Get idEbook
     *
     * @return \EbookBundle\Entity\Ebook
     */
    public function getIdEbook()
    {
        return $this->id_Ebook;
    }
    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Ebook
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Ebook
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set resumer
     *
     * @param string $resumer
     *
     * @return Ebook
     */
    public function setResumer($resumer)
    {
        $this->resumer = $resumer;

        return $this;
    }

    /**
     * Get resumer
     *
     * @return string
     */
    public function getResumer()
    {
        return $this->resumer;
    }

    /**
     * Set typeEbook
     *
     * @param string $typeEbook
     *
     * @return Favoris
     */
    public function setTypeEbook($typeEbook)
    {
        $this->typeEbook = $typeEbook;

        return $this;
    }

    /**
     * Get typeEbook
     *
     * @return string
     */
    public function getTypeEbook()
    {
        return $this->typeEbook;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Ebook
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set nomImage
     * @param String $nomImage
     * @return Favoris
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage = $nomImage;
        return $this;
    }


    /**
     * Get nomImage
     *
     * @return string
     */
    public function getNomImage()
    {
        return $this->nomImage;
    }

}
