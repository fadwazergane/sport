<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActiviteRepository::class)
 */
class Activite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $codeAct;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $libAct;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

  

    public function __toString()
{
return $this->libAct;
}
    public function __construct()
    {
        $this->seances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeAct(): ?string
    {
        return $this->codeAct;
    }

    public function setCodeAct(string $codeAct): self
    {
        $this->codeAct = $codeAct;

        return $this;
    }

    public function getLibAct(): ?string
    {
        return $this->libAct;
    }

    public function setLibAct(string $libAct): self
    {
        $this->libAct = $libAct;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Seance>
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances[] = $seance;
            $seance->setCodeAct($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getCodeAct() === $this) {
                $seance->setCodeAct(null);
            }
        }

        return $this;
    }
}
