<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngenieurRepository")
 * @ORM\Table(name="ingenieur")
 */
class Ingenieur
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="code", type="integer", nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="specialites", type="string", nullable=false)
     */
    private $specialites;

    /**
     * @var int
     *
     * @ORM\Column(name="TJM_inge", type="integer", nullable=false)
     */
    private $TJM_inge;
}
