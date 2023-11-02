<?php

namespace App\Entity;

use App\Repository\SalasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalasRepository::class)]
class Salas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $sala = null;

    #[ORM\ManyToOne(inversedBy: 'salas')]
    private ?Modalidad $modalidad = null;

    #[ORM\ManyToOne(inversedBy: 'salas')]
    private ?Sedes $sedes = null;

    #[ORM\OneToMany(mappedBy: 'sala', targetEntity: DatosClinicos::class)]
    private Collection $datosClinicos;

    public function __construct()
    {
        $this->datosClinicos = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSala(): ?string
    {
        return $this->sala;
    }

    public function setSala(string $sala): static
    {
        $this->sala = $sala;

        return $this;
    }

    public function getModalidad(): ?Modalidad
    {
        return $this->modalidad;
    }

    public function setModalidad(?Modalidad $modalidad): static
    {
        $this->modalidad = $modalidad;

        return $this;
    }

    public function getSedes(): ?Sedes
    {
        return $this->sedes;
    }

    public function setSedes(?Sedes $sedes): static
    {
        $this->sedes = $sedes;

        return $this;
    }

    /**
     * @return Collection<int, DatosClinicos>
     */
    public function getDatosClinicos(): Collection
    {
        return $this->datosClinicos;
    }

    public function addDatosClinico(DatosClinicos $datosClinico): static
    {
        if (!$this->datosClinicos->contains($datosClinico)) {
            $this->datosClinicos->add($datosClinico);
            $datosClinico->setSala($this);
        }

        return $this;
    }

    public function removeDatosClinico(DatosClinicos $datosClinico): static
    {
        if ($this->datosClinicos->removeElement($datosClinico)) {
            // set the owning side to null (unless already changed)
            if ($datosClinico->getSala() === $this) {
                $datosClinico->setSala(null);
            }
        }

        return $this;
    }

   
}
