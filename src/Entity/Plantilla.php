<?php

namespace App\Entity;

use App\Repository\PlantillaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantillaRepository::class)]
class Plantilla
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $plantilla = null;

    #[ORM\ManyToOne(inversedBy: 'plantillas')]
    private ?Modalidad $modalidad = null;

    #[ORM\ManyToOne(inversedBy: 'plantillas')]
    private ?User $usuario = null;

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

    public function getPlantilla(): ?string
    {
        return $this->plantilla;
    }

    public function setPlantilla(string $plantilla): static
    {
        $this->plantilla = $plantilla;

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

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }
}
