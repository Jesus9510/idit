<?php

namespace App\Entity;

use App\Repository\TipoEpsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoEpsRepository::class)]
class TipoEps
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\OneToMany(mappedBy: 'tipoeps', targetEntity: Convenio::class)]
    private Collection $convenios;

    public function __construct()
    {
        $this->convenios = new ArrayCollection();
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

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
            $convenio->setTipoeps($this);
        }

        return $this;
    }

    public function removeConvenio(Convenio $convenio): static
    {
        if ($this->convenios->removeElement($convenio)) {
            // set the owning side to null (unless already changed)
            if ($convenio->getTipoeps() === $this) {
                $convenio->setTipoeps(null);
            }
        }

        return $this;
    }
}

