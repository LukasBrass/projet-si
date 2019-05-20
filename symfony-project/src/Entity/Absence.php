<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AbsenceRepository")
 * @ORM\Table(name="absence", indexes={@ORM\Index(name="Absence_Consultant_FK", columns={"Code"})})
 */
class Absence
{
    /**
 * @var int
 * @ORM\Id
 * @ORM\Column(name="annee", type="integer", nullable=false)
 */
    private $annee;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="mois", type="integer", nullable=false)
     */
    private $mois;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="jour", type="integer", nullable=false)
     */
    private $jour;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="code", type="integer", nullable=false)
     */
    private $code;

    /**
     * @var int
     *
     * @ORM\Column(name="flag", type="integer", nullable=false)
     */
    private $flag;

    /**
     * @return int
     */
    public function getAnnee(): int
    {
        return $this->annee;
    }

    /**
     * @param int $annee
     */
    public function setAnnee(int $annee): void
    {
        $this->annee = $annee;
    }

    /**
     * @return int
     */
    public function getMois(): int
    {
        return $this->mois;
    }

    /**
     * @param int $mois
     */
    public function setMois(int $mois): void
    {
        $this->mois = $mois;
    }

    /**
     * @return int
     */
    public function getJour(): int
    {
        return $this->jour;
    }

    /**
     * @param int $jour
     */
    public function setJour(int $jour): void
    {
        $this->jour = $jour;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getFlag(): int
    {
        return $this->flag;
    }

    /**
     * @param int $flag
     */
    public function setFlag(int $flag): void
    {
        $this->flag = $flag;
    }


}
