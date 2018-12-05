<?php

namespace EbookBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Ebook
 *
 * @ORM\Table(name="ebook")
 * @ORM\Entity(repositoryClass="EbookBundle\Repository\ProduitRepository")
 */
class Ebook
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
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

    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @ORM\Column(name="nomImage",type="string",length=255,nullable=true)
     */
    public $nomImage;

    /**
     * @Assert\File(maxSize="5000k")
     */
    public $file;



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
     * Set type
     *
     * @param string $type
     *
     * @return Ebook
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
    public function getWebPath()
    {
        return null=== $this->nomImage ? null : $this->getUploadDir.'/'.$this->nomImage;
    }
    protected  function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir()
    {
        return 'images';
    }
    public function UploadProfilePicture(){
        $this->file->move($this->getUploadRootDir(),$this->file->getClientOriginalName());
        $this->nomImage=$this->file->getClientOriginalName();
        $this->file=null;
    }

    /**
     * Set nomImage
     * @param String $nomImage
     * @return Categorie
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage==$nomImage;
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

}
