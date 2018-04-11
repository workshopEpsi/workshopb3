<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiants
 *
 * @ORM\Table(name="Etudiants", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="FK_Etudiants_id_Ecoles", columns={"id_Ecoles"}), @ORM\Index(name="FK_Etudiants_id_Groupes", columns={"id_Groupes"})})
 * @ORM\Entity
 */
class Etudiants
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=25, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=25, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=25, nullable=false)
     */
    private $mdp;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Ecoles
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ecoles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Ecoles", referencedColumnName="id")
     * })
     */
    private $idEcoles;

    /**
     * @var \AppBundle\Entity\Groupes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Groupes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Groupes", referencedColumnName="id")
     * })
     */
    private $idGroupes;

    /**
     * Etudiants constructor.
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return Ecoles
     */
    public function getIdEcoles()
    {
        return $this->idEcoles;
    }

    /**
     * @param Ecoles $idEcoles
     */
    public function setIdEcoles($idEcoles)
    {
        $this->idEcoles = $idEcoles;
    }

    /**
     * @return Groupes
     */
    public function getIdGroupes()
    {
        return $this->idGroupes;
    }

    /**
     * @param Groupes $idGroupes
     */
    public function setIdGroupes($idGroupes)
    {
        $this->idGroupes = $idGroupes;
    }


}

