<?php

namespace App\Entity;

use App\Repository\EstudiosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstudiosRepository::class)]
class Estudios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'estudios')]
    private ?Modalidad $modalidad = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?bool $birad = null;

    #[ORM\Column]
    private ?bool $activo = null;

    #[ORM\Column]
    private ?bool $consentimiento = null;

    #[ORM\OneToMany(mappedBy: 'tipo_estudio', targetEntity: DatosClinicos::class)]
    private Collection $datosClinicos;

    public function __construct()
    {
        $this->datosClinicos = new ArrayCollection();
    }

   

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function isBirad(): ?bool
    {
        return $this->birad;
    }

    public function setBirad(bool $birad): static
    {
        $this->birad = $birad;

        return $this;
    }

    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): static
    {
        $this->activo = $activo;

        return $this;
    }

    public function isConsentimiento(): ?bool
    {
        return $this->consentimiento;
    }

    public function setConsentimiento(bool $consentimiento): static
    {
        $this->consentimiento = $consentimiento;

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
            $datosClinico->setTipoEstudio($this);
        }

        return $this;
    }

    public function removeDatosClinico(DatosClinicos $datosClinico): static
    {
        if ($this->datosClinicos->removeElement($datosClinico)) {
            // set the owning side to null (unless already changed)
            if ($datosClinico->getTipoEstudio() === $this) {
                $datosClinico->setTipoEstudio(null);
            }
        }

        return $this;
    }

}

