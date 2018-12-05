<?php

namespace booksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LivreOccasion
 *
 * @ORM\Table(name="livre_occasion")
 * @ORM\Entity(repositoryClass="booksBundle\Repository\LivreOccasionRepository")
 */
class LivreOccasion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_livre", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idLivre;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="categorie", referencedColumnName="id_categorie")
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=40)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=40)
     */
    private $auteur;

    /**
     * @var float
     *
     * @ORM\Column(name="prixOccasion", type="float")
     */
    private $prixOccasion;

    /**
     * @var string
     *
     * @ORM\Column(name="etatLivre", type="string", length=40)
     */
    private $etatLivre;

    /**
     * @var int
     *
     * @ORM\Column(name="treated", type="integer")
     */
    private $treated='0';

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @return int
     */
    public function getIdLivre()
    {
        return $this->idLivre;
    }

    /**
     * @param int $idLivre
     */
    public function setIdLivre($idLivre)
    {
        $this->idLivre = $idLivre;
    }


    /**
     * Set user
     *
     * @param string $user
     *
     * @return LivreOccasion
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return LivreOccasion
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
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
     * Set treated
     *
     * @param integer $treated
     *
     * @return LivreOccasion
     */
    public function setTreated($treated)
    {
        $this->treated = $treated;

        return $this;
    }

    /**
     * Get treated
     *
     * @return int
     */
    public function getTreated()
    {
        return $this->treated;
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
}

