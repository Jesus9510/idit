<?php

namespace App\Entity;

use App\Repository\ConvenioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConvenioRepository::class)]
class Convenio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'convenios')]
    private ?TipoEps $tipoeps = null;

    #[ORM\ManyToOne(inversedBy: 'convenios')]
    private ?Ciudad $ciudad = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $nit = null;

    #[ORM\Column]
    private ?int $codigo = null;

    #[ORM\OneToMany(mappedBy: 'convenio', targetEntity: DatosClinicos::class)]
    private Collection $datosClinicos;

    public function __construct()
    {
        $this->datosClinicos = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoeps(): ?TipoEps
    {
        return $this->tipoeps;
    }

    public function setTipoeps(?TipoEps $tipoeps): static
    {
        $this->tipoeps = $tipoeps;

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

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo): static
    {
        $this->codigo = $codigo;

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
            $datosClinico->setConvenio($this);
        }

        return $this;
    }

    public function removeDatosClinico(DatosClinicos $datosClinico): static
    {
        if ($this->datosClinicos->removeElement($datosClinico)) {
            // set the owning side to null (unless already changed)
            if ($datosClinico->getConvenio() === $this) {
                $datosClinico->setConvenio(null);
            }
        }

        return $this;
    }

   

}
