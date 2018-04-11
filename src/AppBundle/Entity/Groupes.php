<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupes
 *
 * @ORM\Table(name="Groupes", uniqueConstraints={@ORM\UniqueConstraint(name="nom", columns={"nom"})}, indexes={@ORM\Index(name="FK_Groupes_id_Portefeuille", columns={"id_Portefeuille"}), @ORM\Index(name="FK_Groupes_id_Etudiants", columns={"id_Etudiants"})})
 * @ORM\Entity
 */
class Groupes
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
     * @ORM\Column(name="dateCreation", type="date", nullable=false)
     */
    private $datecreation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Etudiants
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Etudiants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Etudiants", referencedColumnName="id")
     * })
     */
    private $idEtudiants;

    /**
     * @var \AppBundle\Entity\Portefeuille
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Portefeuille")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Portefeuille", referencedColumnName="id")
     * })
     */
    private $idPortefeuille;

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
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * @param \DateTime $datecreation
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;
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
     * @return Etudiants
     */
    public function getIdEtudiants()
    {
        return $this->idEtudiants;
    }

    /**
     * @param Etudiants $idEtudiants
     */
    public function setIdEtudiants($idEtudiants)
    {
        $this->idEtudiants = $idEtudiants;
    }

    /**
     * @return Portefeuille
     */
    public function getIdPortefeuille()
    {
        return $this->idPortefeuille;
    }

    /**
     * @param Portefeuille $idPortefeuille
     */
    public function setIdPortefeuille($idPortefeuille)
    {
        $this->idPortefeuille = $idPortefeuille;
    }


}

