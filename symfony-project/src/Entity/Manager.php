<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manager
 *
 * @ORM\Table(name="Manager", indexes={@ORM\Index(name="Manager_User_FK", columns={"id"})})
 * @ORM\Entity
 */
class Manager
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="App\Entity\User")
     */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }



}
