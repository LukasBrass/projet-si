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
     * @ORM\Column(name="jour", type="string", nullable=false)
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
}
