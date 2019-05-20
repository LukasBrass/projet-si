<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DateRepository")
 * @ORM\Table(name="date")
 */
class Date
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="Annee", type="integer", nullable=false)
     */
    private $annee;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="Mois", type="integer", nullable=false)
     */
    private $mois;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="Jour", type="integer", nullable=false)
     */
    private $jour;
}
