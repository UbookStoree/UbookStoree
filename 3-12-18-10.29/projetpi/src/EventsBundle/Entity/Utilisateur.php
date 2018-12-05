<?php

namespace EventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", uniqueConstraints={@ORM\UniqueConstraint(name="id_utilisateur", columns={"id_utilisateur"}), @ORM\UniqueConstraint(name="cin", columns={"cin"}), @ORM\UniqueConstraint(name="pseudo", columns={"username"})})
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="userNom", type="string", length=255, nullable=false)
     */
    private $usernom;

    /**
     * @var string
     *
     * @ORM\Column(name="userPrenom", type="string", length=255, nullable=false)
     */
    private $userprenom;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=100, nullable=false)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical", type="string", length=180, nullable=true)
     */
    private $emailCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=180, nullable=true)
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=100, nullable=false)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", type="string", length=100, nullable=false)
     */
    private $dateNaissance;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", nullable=false)
     */
    private $roles;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmation_token", type="string", length=180, nullable=true)
     */
    private $confirmationToken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_requested_at", type="datetime", nullable=true)
     */
    private $passwordRequestedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="userAdresse", type="string", length=255, nullable=false)
     */
    private $useradresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="userphone", type="integer", nullable=false)
     */
    private $userphone;

    /**
     * @var string
     *
     * @ORM\Column(name="userImage", type="string", length=255, nullable=true)
     */
    private $userimage;


}

