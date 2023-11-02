<?php

namespace App\Entity;

use App\Repository\ProcedenciaCitaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcedenciaCitaRepository::class)]
class ProcedenciaCita
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(mappedBy: 'procedencia', targetEntity: DatosClinicos::class)]
    private Collection $datosClinicos;

    public function __construct()
    {
        $this->datosClinicos = new ArrayCollection();
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
            $datosClinico->setProcedencia($this);
        }

        return $this;
    }

    public function removeDatosClinico(DatosClinicos $datosClinico): static
    {
        if ($this->datosClinicos->removeElement($datosClinico)) {
            // set the owning side to null (unless already changed)
            if ($datosClinico->getProcedencia() === $this) {
                $datosClinico->setProcedencia(null);
            }
        }

        return $this;
    }

  
}
