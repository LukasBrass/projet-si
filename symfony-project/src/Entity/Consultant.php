<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsultantRepository")
 * @ORM\Table(name="consultant", indexes={@ORM\Index(name="Consultant_Equipe_FK", columns={"idEquipe"})})
 */
class Consultant
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="Code", type="integer", nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", nullable=false)
     */
    private $prenom;

    /**
    * @var string
    *
    * @ORM\Column(name="telephone", type="string", nullable=false)
    */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="HiringYear", type="string", nullable=false)
     */
    private $hiringYear;

    /**
     * @var Equipe
     * @ORM\Column(name="IdEquipe", type="integer", nullable=false)
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe", inversedBy="id")
     */
    private $equipe;

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

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getHiringYear(): string
    {
        return $this->hiringYear;
    }

    /**
     * @param string $hiringYear
     */
    public function setHiringYear(string $hiringYear): void
    {
        $this->hiringYear = $hiringYear;
    }

    /**
     * @return Equipe
     */
    public function getEquipe(): Equipe
    {
        return $this->equipe;
    }

    /**
     * @param Equipe $equipe
     */
    public function setEquipe(Equipe $equipe): void
    {
        $this->equipe = $equipe;
    }


}
