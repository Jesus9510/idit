<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpresaRepository::class)]
class Empresa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $nit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\OneToMany(mappedBy: 'empresa', targetEntity: Sedes::class)]
    private Collection $sedes;

    public function __construct()
    {
        $this->sedes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNit(): ?string
    {
        return $this->nit;
    }

    public function setNit(string $nit): static
    {
        $this->nit = $nit;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

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
            $sede->setEmpresa($this);
        }

        return $this;
    }

    public function removeSede(Sedes $sede): static
    {
        if ($this->sedes->removeElement($sede)) {
            // set the owning side to null (unless already changed)
            if ($sede->getEmpresa() === $this) {
                $sede->setEmpresa(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nombre; // Reemplaza 'nombre' con el atributo que deseas mostrar
    }
}
