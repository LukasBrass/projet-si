<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultant
 *
 * @ORM\Table(name="Consultant", indexes={@ORM\Index(name="Consultant_User_FK", columns={"id"})})
 * @ORM\Entity
 */
class Consultant
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
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=50, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name_c", type="string", length=50, nullable=false)
     */
    private $nameC;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname_c", type="string", length=50, nullable=false)
     */
    private $firstnameC;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=50, nullable=false)
     */
    private $mail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hired_date", type="date", nullable=false)
     */
    private $hiredDate;

    /**
     * @var string
     *
     * @ORM\Column(name="type_metier", type="string", length=5, nullable=false)
     */
    private $typeMetier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specialite", type="string", length=50, nullable=true)
     */
    private $specialite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="TJM_Ing", type="integer", nullable=true)
     */
    private $tjmIng;

    /**
     * @var int|null
     *
     * @ORM\Column(name="TJM_CP", type="integer", nullable=true)
     */
    private $tjmCp;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getNameC(): ?string
    {
        return $this->nameC;
    }

    /**
     * @param string $nameC
     */
    public function setNameC(string $nameC): void
    {
        $this->nameC = $nameC;
    }

    /**
     * @return string
     */
    public function getFirstnameC(): string
    {
        return $this->firstnameC;
    }

    /**
     * @param string $firstnameC
     */
    public function setFirstnameC(string $firstnameC): void
    {
        $this->firstnameC = $firstnameC;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
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
     * @return \DateTime
     */
    public function getHiredDate(): \DateTime
    {
        return $this->hiredDate;
    }

    /**
     * @param \DateTime $hiredDate
     */
    public function setHiredDate(\DateTime $hiredDate): void
    {
        $this->hiredDate = $hiredDate;
    }

    /**
     * @return string
     */
    public function getTypeMetier(): string
    {
        return $this->typeMetier;
    }

    /**
     * @param string $typeMetier
     */
    public function setTypeMetier(string $typeMetier): void
    {
        $this->typeMetier = $typeMetier;
    }

    /**
     * @return string|null
     */
    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    /**
     * @param string|null $specialite
     */
    public function setSpecialite(?string $specialite): void
    {
        $this->specialite = $specialite;
    }

    /**
     * @return int|null
     */
    public function getTjmIng(): ?int
    {
        return $this->tjmIng;
    }

    /**
     * @param int|null $tjmIng
     */
    public function setTjmIng(?int $tjmIng): void
    {
        $this->tjmIng = $tjmIng;
    }

    /**
     * @return int|null
     */
    public function getTjmCp(): ?int
    {
        return $this->tjmCp;
    }

    /**
     * @param int|null $tjmCp
     */
    public function setTjmCp(?int $tjmCp): void
    {
        $this->tjmCp = $tjmCp;
    }
}
