<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImputationRepository")
 * @ORM\Table(name="imputation", indexes={@ORM\Index(name="Imputation_Ingenieur_FK", columns={"Code"}), @ORM\Index(name="Imputation_Projet_FK", columns={"idProjet"}), @ORM\Index(name="Imputation_Calendrier_FK", columns={"Annee", "Mois"})})
 */
class Imputation
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
     * @var Projet
     * @ORM\Id
     * @ORM\Column(name="idProjet", type="integer", nullable=false)
     * @ORM\ManyToOne(targetEntity="App\Entity\Projet", inversedBy="idProjet")

     */
    private $projet;

    /**
     * @var int
     *
     * @ORM\Column(name="jour", type="integer", nullable=false)
     */
    private $jour;
}
