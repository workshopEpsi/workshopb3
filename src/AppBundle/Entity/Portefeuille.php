<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portefeuille
 *
 * @ORM\Table(name="Portefeuille", indexes={@ORM\Index(name="FK_Portefeuille_id_Groupes", columns={"id_Groupes"}), @ORM\Index(name="FK_Portefeuille_id_Intervenants", columns={"id_Intervenants"})})
 * @ORM\Entity
 */
class Portefeuille
{
    /**
     * @var integer
     *
     * @ORM\Column(name="creditJetons", type="integer", nullable=true)
     */
    private $creditjetons;

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
     * @var \AppBundle\Entity\Intervenants
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Intervenants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Intervenants", referencedColumnName="id")
     * })
     */
    private $idIntervenants;

    /**
     * @return int
     */
    public function getCreditjetons()
    {
        return $this->creditjetons;
    }

    /**
     * @param int $creditjetons
     */
    public function setCreditjetons($creditjetons)
    {
        $this->creditjetons = $creditjetons;
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
     * @return Intervenants
     */
    public function getIdIntervenants()
    {
        return $this->idIntervenants;
    }

    /**
     * @param Intervenants $idIntervenants
     */
    public function setIdIntervenants($idIntervenants)
    {
        $this->idIntervenants = $idIntervenants;
    }


}

