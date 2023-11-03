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

    #[ORM\Column(nullable: true)]
    private ?bool $habilitado = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ae_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ip = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $puerto = null;

    #[ORM\Column]
    private ?bool $nodo_dicom = null;

    #[ORM\Column]
    private ?bool $paso_lectura = null;

    #[ORM\Column]
    private ?bool $agrupar_estudios = null;

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

    public function isHabilitado(): ?bool
    {
        return $this->habilitado;
    }

    public function setHabilitado(?bool $habilitado): static
    {
        $this->habilitado = $habilitado;

        return $this;
    }

    public function getAeTitle(): ?string
    {
        return $this->ae_title;
    }

    public function setAeTitle(?string $ae_title): static
    {
        $this->ae_title = $ae_title;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }

    public function getPuerto(): ?string
    {
        return $this->puerto;
    }

    public function setPuerto(?string $puerto): static
    {
        $this->puerto = $puerto;

        return $this;
    }

    public function isNodoDicom(): ?bool
    {
        return $this->nodo_dicom;
    }

    public function setNodoDicom(bool $nodo_dicom): static
    {
        $this->nodo_dicom = $nodo_dicom;

        return $this;
    }

    public function isPasoLectura(): ?bool
    {
        return $this->paso_lectura;
    }

    public function setPasoLectura(bool $paso_lectura): static
    {
        $this->paso_lectura = $paso_lectura;

        return $this;
    }

    public function isAgruparEstudios(): ?bool
    {
        return $this->agrupar_estudios;
    }

    public function setAgruparEstudios(bool $agrupar_estudios): static
    {
        $this->agrupar_estudios = $agrupar_estudios;

        return $this;
    }

   
}
