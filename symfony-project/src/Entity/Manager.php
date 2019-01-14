<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manager
 *
 * @ORM\Table(name="Manager")
 * @ORM\Entity
 */
class Manager
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
