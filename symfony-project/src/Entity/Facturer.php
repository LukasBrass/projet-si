<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacturerRepository")
 * @ORM\Table(name="facturer", indexes={@ORM\Index(name="Facturer_Client_FK", columns={"idClient"}), @ORM\Index(name="Facturer_Equipe_FK", columns={"idEquipe"})})
 */
class Facturer
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
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="id")

     */
    private $idClient;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idEquipe", type="integer", nullable=false)
     */
    private $idEquipe;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;
}
