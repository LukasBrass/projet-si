<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChefprojetRepository")
 * @ORM\Table(name="chefprojet")
 */
class Chefprojet
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="code", type="integer", nullable=false)
     */
    private $code;

    /**
     * @var int
     *
     * @ORM\Column(name="TJM_CdP", type="integer", nullable=false)
     */
    private $TJM_CdP;

}
