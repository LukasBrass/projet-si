<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EquipeProjet
 *
 * @ORM\Table(name="EquipeProjet", indexes={@ORM\Index(name="Equipe_Projet_FK", columns={"id_consultant", "id_projet"})})
 * @ORM\Entity
 */
class EquipeProjet
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_consultant", type="integer", nullable=false)
     * @ORM\ManyToOne(targetEntity="Consultant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_consultant", referencedColumnName="id")
     * })
     */
    private $idConsultant;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_projet", type="integer", nullable=false)
     * @ORM\ManyToOne(targetEntity="Projet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_projet", referencedColumnName="id")
     * })
     */
    private $idProjet;

    /**
     * @var int
     *
     * @ORM\Column(name="workedDays", type="integer", nullable=false)
     */
    private $workedDays = 0;

    /**
     * @return int
     */
    public function getIdConsultant(): int
    {
        return $this->idConsultant;
    }

    /**
     * @param int $idConsultant
     */
    public function setIdConsultant(int $idConsultant): void
    {
        $this->idConsultant = $idConsultant;
    }

    /**
     * @return int
     */
    public function getIdProjet(): int
    {
        return $this->idProjet;
    }

    /**
     * @param int $idProjet
     */
    public function setIdProjet(int $idProjet): void
    {
        $this->idProjet = $idProjet;
    }

    /**
     * @return int
     */
    public function getWorkedDays(): int
    {
        return $this->workedDays;
    }

    /**
     * @param int $workedDays
     */
    public function setWorkedDays(int $workedDays): void
    {
        $this->workedDays = $workedDays;
    }


}
