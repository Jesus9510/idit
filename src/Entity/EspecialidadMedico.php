<?php

namespace App\Entity;

use App\Repository\EspecialidadMedicoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspecialidadMedicoRepository::class)]
class EspecialidadMedico
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $especialidad = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspecialidad(): ?string
    {
        return $this->especialidad;
    }

    public function setEspecialidad(string $especialidad): static
    {
        $this->especialidad = $especialidad;

        return $this;
    }
}
