<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeProjetRepository")
 * @ORM\Table(name="typeprojet")
 */
class TypeProjet
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="IdType", type="integer", nullable=false)
     */
    private $idType;

    /**
     * @var string
     *
     * @ORM\Column(name="nomTypeProjet", type="string", nullable=false)
     */
    private $nomTypeProjet;

    /**
     * @return int
     */
    public function getIdType(): int
    {
        return $this->idType;
    }

    /**
     * @param int $idType
     */
    public function setIdType(int $idType): void
    {
        $this->idType = $idType;
    }

    /**
     * @return string
     */
    public function getNomTypeProjet(): string
    {
        return $this->nomTypeProjet;
    }

    /**
     * @param string $nomTypeProjet
     */
    public function setNomTypeProjet(string $nomTypeProjet): void
    {
        $this->nomTypeProjet = $nomTypeProjet;
    }


}
