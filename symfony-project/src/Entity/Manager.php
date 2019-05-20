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
     * @ORM\Id
     * @ORM\Column(name="IdManager", type="integer", nullable=false)
     */
    private $idManager;

    /**
     * @var string
     *
     * @ORM\Column(name="nomManager", type="string", nullable=false)
     */
    private $nomManager;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomManager", type="string", nullable=false)
     */
    private $prenomManager;

    /**
     * @return int
     */
    public function getIdManager(): int
    {
        return $this->idManager;
    }

    /**
     * @param int $idManager
     */
    public function setIdManager(int $idManager): void
    {
        $this->idManager = $idManager;
    }

    /**
     * @return string
     */
    public function getNomManager(): string
    {
        return $this->nomManager;
    }

    /**
     * @param string $nomManager
     */
    public function setNomManager(string $nomManager): void
    {
        $this->nomManager = $nomManager;
    }

    /**
     * @return string
     */
    public function getPrenomManager(): string
    {
        return $this->prenomManager;
    }

    /**
     * @param string $prenomManager
     */
    public function setPrenomManager(string $prenomManager): void
    {
        $this->prenomManager = $prenomManager;
    }

}
