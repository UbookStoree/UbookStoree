<?php

namespace AchatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LivreOccasion
 *
 * @ORM\Table(name="livre_occasion", indexes={@ORM\Index(name="categorie_ibfk_1", columns={"id_categorie_fk"})})
 * @ORM\Entity
 */
class LivreOccasion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_livre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLivre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user_fk", type="integer", nullable=false)
     */
    private $idUserFk;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255, nullable=false)
     */
    private $auteur;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_occasion", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixOccasion;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="string", length=255, nullable=false)
     */
    private $resume;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_livre", type="string", length=255, nullable=false)
     */
    private $etatLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="traitement", type="string", length=255, nullable=true)
     */
    private $traitement;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categorie_fk", referencedColumnName="id_categorie")
     * })
     */
    private $idCategorieFk;



    /**
     * Get idLivre
     *
     * @return integer
     */
    public function getIdLivre()
    {
        return $this->idLivre;
    }

    /**
     * Set idUserFk
     *
     * @param integer $idUserFk
     *
     * @return LivreOccasion
     */
    public function setIdUserFk($idUserFk)
    {
        $this->idUserFk = $idUserFk;

        return $this;
    }

    /**
     * Get idUserFk
     *
     * @return integer
     */
    public function getIdUserFk()
    {
        return $this->idUserFk;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return LivreOccasion
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
     * @return LivreOccasion
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
     * Set prixOccasion
     *
     * @param float $prixOccasion
     *
     * @return LivreOccasion
     */
    public function setPrixOccasion($prixOccasion)
    {
        $this->prixOccasion = $prixOccasion;

        return $this;
    }

    /**
     * Get prixOccasion
     *
     * @return float
     */
    public function getPrixOccasion()
    {
        return $this->prixOccasion;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return LivreOccasion
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set etatLivre
     *
     * @param string $etatLivre
     *
     * @return LivreOccasion
     */
    public function setEtatLivre($etatLivre)
    {
        $this->etatLivre = $etatLivre;

        return $this;
    }

    /**
     * Get etatLivre
     *
     * @return string
     */
    public function getEtatLivre()
    {
        return $this->etatLivre;
    }

    /**
     * Set traitement
     *
     * @param string $traitement
     *
     * @return LivreOccasion
     */
    public function setTraitement($traitement)
    {
        $this->traitement = $traitement;

        return $this;
    }

    /**
     * Get traitement
     *
     * @return string
     */
    public function getTraitement()
    {
        return $this->traitement;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return LivreOccasion
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

    /**
     * Set idCategorieFk
     *
     * @param \AchatBundle\Entity\Categorie $idCategorieFk
     *
     * @return LivreOccasion
     */
    public function setIdCategorieFk(\AchatBundle\Entity\Categorie $idCategorieFk = null)
    {
        $this->idCategorieFk = $idCategorieFk;

        return $this;
    }

    /**
     * Get idCategorieFk
     *
     * @return \AchatBundle\Entity\Categorie
     */
    public function getIdCategorieFk()
    {
        return $this->idCategorieFk;
    }
}
