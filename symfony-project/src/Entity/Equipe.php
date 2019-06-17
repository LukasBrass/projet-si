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
    private $id;

    /**
     * @var Manager
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Manager", inversedBy="idManager")
     * @ORM\JoinColumn(name="idManager", referencedColumnName="IdManager")

     */
    private $manager;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }

    /**
     * @param Manager $manager
     */
    public function setManager(Manager $manager): void
    {
        $this->manager = $manager;
    }


}
