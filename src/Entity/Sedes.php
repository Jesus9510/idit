<?php

namespace App\Entity;

use App\Repository\SedesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SedesRepository::class)]
class Sedes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $contacto = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'sedes')]
    private ?Empresa $empresa = null;

    #[ORM\OneToMany(mappedBy: 'sedes', targetEntity: Salas::class)]
    private Collection $salas;

    #[ORM\OneToMany(mappedBy: 'sede', targetEntity: Reporte::class)]
    private Collection $reportes;

    #[ORM\ManyToOne(inversedBy: 'sedes')]
    private ?Ciudad $ciudad = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'sedes')]
    private Collection $users;



    public function __construct()
    {
        $this->salas = new ArrayCollection();
        $this->reportes = new ArrayCollection();
        $this->users = new ArrayCollection();
       
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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): static
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getContacto(): ?string
    {
        return $this->contacto;
    }

    public function setContacto(string $contacto): static
    {
        $this->contacto = $contacto;

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

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): static
    {
        $this->empresa = $empresa;

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
            $sala->setSedes($this);
        }

        return $this;
    }

    public function removeSala(Salas $sala): static
    {
        if ($this->salas->removeElement($sala)) {
            // set the owning side to null (unless already changed)
            if ($sala->getSedes() === $this) {
                $sala->setSedes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reporte>
     */
    public function getReportes(): Collection
    {
        return $this->reportes;
    }

    public function addReporte(Reporte $reporte): static
    {
        if (!$this->reportes->contains($reporte)) {
            $this->reportes->add($reporte);
            $reporte->setSede($this);
        }

        return $this;
    }

    public function removeReporte(Reporte $reporte): static
    {
        if ($this->reportes->removeElement($reporte)) {
            // set the owning side to null (unless already changed)
            if ($reporte->getSede() === $this) {
                $reporte->setSede(null);
            }
        }

        return $this;
    }

    public function getCiudad(): ?Ciudad
    {
        return $this->ciudad;
    }

    public function setCiudad(?Ciudad $ciudad): static
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addSede($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeSede($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre; // Reemplaza 'nombre' con el atributo que deseas mostrar
    }
}

