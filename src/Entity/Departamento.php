<?php

namespace App\Entity;

use App\Repository\DepartamentoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartamentoRepository::class)]
class Departamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $departamento = null;

    #[ORM\OneToMany(mappedBy: 'departamento', targetEntity: Ciudad::class)]
    private Collection $ciudads;

    #[ORM\OneToMany(mappedBy: 'departamento', targetEntity: Paciente::class)]
    private Collection $pacientes;

    public function __construct()
    {
        $this->ciudads = new ArrayCollection();
        $this->pacientes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartamento(): ?string
    {
        return $this->departamento;
    }

    public function setDepartamento(string $departamento): static
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * @return Collection<int, Ciudad>
     */
    public function getCiudads(): Collection
    {
        return $this->ciudads;
    }

    public function addCiudad(Ciudad $ciudad): static
    {
        if (!$this->ciudads->contains($ciudad)) {
            $this->ciudads->add($ciudad);
            $ciudad->setDepartamento($this);
        }

        return $this;
    }

    public function removeCiudad(Ciudad $ciudad): static
    {
        if ($this->ciudads->removeElement($ciudad)) {
            // set the owning side to null (unless already changed)
            if ($ciudad->getDepartamento() === $this) {
                $ciudad->setDepartamento(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Paciente>
     */
    public function getPacientes(): Collection
    {
        return $this->pacientes;
    }

    public function addPaciente(Paciente $paciente): static
    {
        if (!$this->pacientes->contains($paciente)) {
            $this->pacientes->add($paciente);
            $paciente->setDepartamento($this);
        }

        return $this;
    }

    public function removePaciente(Paciente $paciente): static
    {
        if ($this->pacientes->removeElement($paciente)) {
            // set the owning side to null (unless already changed)
            if ($paciente->getDepartamento() === $this) {
                $paciente->setDepartamento(null);
            }
        }

        return $this;
    }
}

