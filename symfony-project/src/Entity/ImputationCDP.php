<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImputationCDPRepository")
 * @ORM\Table(name="imputationcdp", indexes={@ORM\Index(name="ImputationCdP_ChefProjet_FK", columns={"Code"})})
 */
class ImputationCDP
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
     * @ORM\Column(name="code", type="integer", nullable=false)
     */
    private $code;

    /**
     * @var int
     *
     * @ORM\Column(name="jour", type="integer", nullable=false)
     */
    private $jour;
}
