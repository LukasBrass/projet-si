<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetRepository")
 * @ORM\Table(name="projet", indexes={@ORM\Index(name="Projet_Manager_FK", columns={"IdManager"}), @ORM\Index(name="Projet_TypeProjet0_FK", columns={"IdType"}), @ORM\Index(name="Projet_Client1_FK", columns={"IdClient"}), @ORM\Index(name="Projet_ChefProjet2_FK", columns={"Code"})})
 */
class Projet
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idProjet", type="integer", nullable=false)
     */
    private $idProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProjet", type="string", nullable=false)
     */
    private $nomProjet;

    /**
     * @var \dateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \dateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var Manager
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Manager", inversedBy="IdManager")
     * @ORM\JoinColumn(name="IdManager", referencedColumnName="IdManager")
     */
    private $manager;

    /**
     * @var TypeProjet
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeProjet", inversedBy="IdType")
     * @ORM\JoinColumn(name="IdType", referencedColumnName="IdType")

     */
    private $typeProjet;

    /**
     * @var Client
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="IdClient")
     * @ORM\JoinColumn(name="IdClient", referencedColumnName="IdClient")

     */
    private $client;

    /**
     * @var int
     *
     * @ORM\Column(name="code", type="integer", nullable=false)
     */
    private $code;

    /**
     * @return int
     */
    public function getIdProjet(): int
    {
        return $this->idProjet;
    }

    /**
     * @param int $idProjet
     */
    public function setIdProjet(int $idProjet): void
    {
        $this->idProjet = $idProjet;
    }

    /**
     * @return string
     */
    public function getNomProjet(): string
    {
        return $this->nomProjet;
    }

    /**
     * @param string $nomProjet
     */
    public function setNomProjet(string $nomProjet): void
    {
        $this->nomProjet = $nomProjet;
    }

    /**
     * @return \dateTime
     */
    public function getDateDebut(): \dateTime
    {
        return $this->dateDebut;
    }

    /**
     * @param \dateTime $dateDebut
     */
    public function setDateDebut(\dateTime $dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return \dateTime
     */
    public function getDateFin(): \dateTime
    {
        return $this->dateFin;
    }

    /**
     * @param \dateTime $dateFin
     */
    public function setDateFin(\dateTime $dateFin): void
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }

    /**
     * @param Manager $Manager
     */
    public function setManager(Manager $Manager): void
    {
        $this->manager = $Manager;
    }

    /**
     * @return TypeProjet
     */
    public function getTypeProjet(): TypeProjet
    {
        return $this->typeProjet;
    }

    /**
     * @param TypeProjet $typeProjet
     */
    public function setTypeProjet(TypeProjet $typeProjet): void
    {
        $this->typeProjet = $typeProjet;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }
}
