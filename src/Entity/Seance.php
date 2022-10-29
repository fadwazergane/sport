<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeanceRepository::class)
 */
class Seance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDeb;

    /**
     * @ORM\Column(type="time")
     */
    private $heureFin;

   

    /**
     * @ORM\ManyToOne(targetEntity=Coach::class, inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeCo;

    /**
     * @ORM\ManyToOne(targetEntity=Activite::class, inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeAct;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDeb(): ?\DateTimeInterface
    {
        return $this->heureDeb;
    }

    public function setHeureDeb(\DateTimeInterface $heureDeb): self
    {
        $this->heureDeb = $heureDeb;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

   

    public function getCodeCo(): ?Coach
    {
        return $this->codeCo;
    }

    public function setCodeCo(?Coach $codeCo): self
    {
        $this->codeCo = $codeCo;

        return $this;
    }

    public function getCodeAct(): ?Activite
    {
        return $this->codeAct;
    }

    public function setCodeAct(?Activite $codeAct): self
    {
        $this->codeAct = $codeAct;

        return $this;
    }

    public function getDateSe(): ?\DateTimeInterface
    {
        return $this->dateSe;
    }

    public function setDateSe(\DateTimeInterface $dateSe): self
    {
        $this->dateSe = $dateSe;

        return $this;
    }
}
