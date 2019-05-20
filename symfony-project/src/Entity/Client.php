<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 * @ORM\Table(name="client")
 */
class Client
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="IdClient", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="RaisonSociale", type="string", nullable=false)
     */
    private $raisonSociale;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="Pays", type="string", nullable=false)
     */
    private $pays;

    /**
     * @return int
     */
    public function getIdClient(): int
    {
        return $this->idClient;
    }

    /**
     * @param int $idClient
     */
    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }

    /**
     * @return string
     */
    public function getRaisonSociale(): string
    {
        return $this->raisonSociale;
    }

    /**
     * @param string $raisonSociale
     */
    public function setRaisonSociale(string $raisonSociale): void
    {
        $this->raisonSociale = $raisonSociale;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getPays(): string
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     */
    public function setPays(string $pays): void
    {
        $this->pays = $pays;
    }


}
