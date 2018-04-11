<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervenants
 *
 * @ORM\Table(name="Intervenants", indexes={@ORM\Index(name="FK_Intervenants_id_Ecoles", columns={"id_Ecoles"}), @ORM\Index(name="FK_Intervenants_id_Portefeuille", columns={"id_Portefeuille"})})
 * @ORM\Entity
 */
class Intervenants
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
     * @ORM\Column(name="specialite", type="string", length=25, nullable=false)
     */
    private $specialite;

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
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param string $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
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
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

