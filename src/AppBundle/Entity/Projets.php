<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projets
 *
 * @ORM\Table(name="Projets", uniqueConstraints={@ORM\UniqueConstraint(name="nom", columns={"nom"})}, indexes={@ORM\Index(name="FK_Projets_id_Groupes", columns={"id_Groupes"}), @ORM\Index(name="FK_Projets_id_Sujets", columns={"id_Sujets"})})
 * @ORM\Entity
 */
class Projets
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=true)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var \AppBundle\Entity\Sujets
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sujets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Sujets", referencedColumnName="id")
     * })
     */
    private $idSujets;

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
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param \DateTime $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param \DateTime $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @return Sujets
     */
    public function getIdSujets()
    {
        return $this->idSujets;
    }

    /**
     * @param Sujets $idSujets
     */
    public function setIdSujets($idSujets)
    {
        $this->idSujets = $idSujets;
    }


}

