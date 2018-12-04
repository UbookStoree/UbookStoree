<?php

namespace EventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table(name="livre", uniqueConstraints={@ORM\UniqueConstraint(name="isbn", columns={"idLivre"})})
 * @ORM\Entity
 */
class Livre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idLivre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlivre;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_livre", type="string", length=100, nullable=false)
     */
    private $nomLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=100, nullable=false)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=100, nullable=false)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="string", length=100, nullable=false)
     */
    private $resume;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_initial", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixInitial;


}

