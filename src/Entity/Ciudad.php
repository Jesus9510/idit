<?php

namespace App\Entity;

use App\Repository\CiudadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CiudadRepository::class)]
class Ciudad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ciudad = null;

    #[ORM\Column]
    private ?bool $estado = null;

    #[ORM\ManyToOne(inversedBy: 'ciudads')]
    private ?Departamento $departamento = null;

    #[ORM\OneToMany(mappedBy: 'ciudad', targetEntity: Convenio::class)]
    private Collection $convenios;

    #[ORM\OneToMany(mappedBy: 'ciudad', targetEntity: Paciente::class)]
    private Collection $pacientes;

    #[ORM\OneToMany(mappedBy: 'ciudad', targetEntity: Sedes::class)]
    private Collection $sedes;



    public function __construct()
    {
        $this->convenios = new ArrayCollection();
        $this->pacientes = new ArrayCollection();
        $this->sedes = new ArrayCollection();
      
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): static
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function isEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getDepartamento(): ?Departamento
    {
        return $this->departamento;
    }

    public function setDepartamento(?Departamento $departamento): static
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * @return Collection<int, Convenio>
     */
    public function getConvenios(): Collection
    {
        return $this->convenios;
    }

    public function addConvenio(Convenio $convenio): static
    {
        if (!$this->convenios->contains($convenio)) {
            $this->convenios->add($convenio);
            $convenio->setCiudad($this);
        }

        return $this;
    }

    public function removeConvenio(Convenio $convenio): static
    {
        if ($this->convenios->removeElement($convenio)) {
            // set the owning side to null (unless already changed)
            if ($convenio->getCiudad() === $this) {
                $convenio->setCiudad(null);
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
            $paciente->setCiudad($this);
        }

        return $this;
    }

    public function removePaciente(Paciente $paciente): static
    {
        if ($this->pacientes->removeElement($paciente)) {
            // set the owning side to null (unless already changed)
            if ($paciente->getCiudad() === $this) {
                $paciente->setCiudad(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sedes>
     */
    public function getSedes(): Collection
    {
        return $this->sedes;
    }

    public function addSede(Sedes $sede): static
    {
        if (!$this->sedes->contains($sede)) {
            $this->sedes->add($sede);
            $sede->setCiudad($this);
        }

        return $this;
    }

    public function removeSede(Sedes $sede): static
    {
        if ($this->sedes->removeElement($sede)) {
            // set the owning side to null (unless already changed)
            if ($sede->getCiudad() === $this) {
                $sede->setCiudad(null);
            }
        }

        return $this;
    }

  
}

