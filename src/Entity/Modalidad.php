<?php

namespace App\Entity;

use App\Repository\ModalidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModalidadRepository::class)]
class Modalidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $modalidad = null;

    #[ORM\Column]
    private ?bool $grabacion = null;

    #[ORM\OneToMany(mappedBy: 'modalidad', targetEntity: Plantilla::class)]
    private Collection $plantillas;

    #[ORM\OneToMany(mappedBy: 'modalidad', targetEntity: Salas::class)]
    private Collection $salas;

    #[ORM\OneToMany(mappedBy: 'modalidad', targetEntity: Estudios::class)]
    private Collection $estudios;

    #[ORM\OneToMany(mappedBy: 'modalidad', targetEntity: DatosClinicos::class)]
    private Collection $datosClinicos;

 

    public function __construct()
    {
        $this->plantillas = new ArrayCollection();
        $this->salas = new ArrayCollection();
        $this->estudios = new ArrayCollection();
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

    public function getModalidad(): ?string
    {
        return $this->modalidad;
    }

    public function setModalidad(string $modalidad): static
    {
        $this->modalidad = $modalidad;

        return $this;
    }

    public function isGrabacion(): ?bool
    {
        return $this->grabacion;
    }

    public function setGrabacion(bool $grabacion): static
    {
        $this->grabacion = $grabacion;

        return $this;
    }

    /**
     * @return Collection<int, Plantilla>
     */
    public function getPlantillas(): Collection
    {
        return $this->plantillas;
    }

    public function addPlantilla(Plantilla $plantilla): static
    {
        if (!$this->plantillas->contains($plantilla)) {
            $this->plantillas->add($plantilla);
            $plantilla->setModalidad($this);
        }

        return $this;
    }

    public function removePlantilla(Plantilla $plantilla): static
    {
        if ($this->plantillas->removeElement($plantilla)) {
            // set the owning side to null (unless already changed)
            if ($plantilla->getModalidad() === $this) {
                $plantilla->setModalidad(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Salas>
     */
    public function getSalas(): Collection
    {
        return $this->salas;
    }

    public function addSala(Salas $sala): static
    {
        if (!$this->salas->contains($sala)) {
            $this->salas->add($sala);
            $sala->setModalidad($this);
        }

        return $this;
    }

    public function removeSala(Salas $sala): static
    {
        if ($this->salas->removeElement($sala)) {
            // set the owning side to null (unless already changed)
            if ($sala->getModalidad() === $this) {
                $sala->setModalidad(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Estudios>
     */
    public function getEstudios(): Collection
    {
        return $this->estudios;
    }

    public function addEstudio(Estudios $estudio): static
    {
        if (!$this->estudios->contains($estudio)) {
            $this->estudios->add($estudio);
            $estudio->setModalidad($this);
        }

        return $this;
    }

    public function removeEstudio(Estudios $estudio): static
    {
        if ($this->estudios->removeElement($estudio)) {
            // set the owning side to null (unless already changed)
            if ($estudio->getModalidad() === $this) {
                $estudio->setModalidad(null);
            }
        }

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
            $datosClinico->setModalidad($this);
        }

        return $this;
    }

    public function removeDatosClinico(DatosClinicos $datosClinico): static
    {
        if ($this->datosClinicos->removeElement($datosClinico)) {
            // set the owning side to null (unless already changed)
            if ($datosClinico->getModalidad() === $this) {
                $datosClinico->setModalidad(null);
            }
        }

        return $this;
    }

    
}
