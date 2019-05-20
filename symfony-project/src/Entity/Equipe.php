<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipeRepository")
 * @ORM\Table(name="equipe", indexes={@ORM\Index(name="Equipe_Manager_FK", columns={"idManager"})})
 */
class Equipe
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idEquipe", type="integer", nullable=false)
     */
    private $idEquipe;

    /**
     * @var Manager
     *
     * @ORM\Column(name="idManager", type="integer", nullable=false)
     * @ORM\ManyToOne(targetEntity="App\Entity\Manager", inversedBy="idManager")

     */
    private $manager;
}
