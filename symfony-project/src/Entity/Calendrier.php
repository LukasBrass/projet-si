<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CalendrierRepository")
 * @ORM\Table(name="calendrier")
 */
class Calendrier
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


}
