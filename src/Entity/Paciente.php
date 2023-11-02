<?php

namespace App\Entity;

use App\Repository\PacienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PacienteRepository::class)]
class Paciente
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $primer_nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $segundo_nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $primer_apellido = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $segundo_apellido = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_nacimiento = null;

    #[ORM\Column(length: 255)]
    private ?string $edad = null;

    #[ORM\Column(length: 255)]
    private ?string $sexo = null;

    #[ORM\Column]
    private ?bool $hijo_de = false;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $numero_iden = null;

   

    #[ORM\ManyToOne(inversedBy: 'pacientes')]
    private ?TipoDocumento $tipo_documento = null;

    #[ORM\ManyToOne(inversedBy: 'pacientes')]
    private ?Departamento $departamento = null;



    #[ORM\Column(length: 255)]
    private ?string $zona_residencial = null;

    #[ORM\Column(length: 255)]
    private ?string $telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $correo = null;

    #[ORM\Column(length: 255)]
    private ?string $acudiente = null;

    #[ORM\Column(length: 255)]
    private ?string $celular = null;


   

    #[ORM\OneToMany(mappedBy: 'pacientes', targetEntity: DatosClinicos::class)]
    private Collection $datosClinicos;

    #[ORM\ManyToOne(inversedBy: 'pacientes')]
    private ?GSanguineo $TipoSangre = null;

    #[ORM\ManyToOne(inversedBy: 'pacientes')]
    private ?Ciudad $ciudad = null;

    public function __construct()
    {
        $this->datosClinicos = new ArrayCollection();
    }

   


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrimerNombre(): ?string
    {
        return $this->primer_nombre;
    }

    public function setPrimerNombre(string $primer_nombre): static
    {
        $this->primer_nombre = $primer_nombre;

        return $this;
    }

    public function getSegundoNombre(): ?string
    {
        return $this->segundo_nombre;
    }

    public function setSegundoNombre(?string $segundo_nombre): static
    {
        $this->segundo_nombre = $segundo_nombre;

        return $this;
    }

    public function getPrimerApellido(): ?string
    {
        return $this->primer_apellido;
    }

    public function setPrimerApellido(string $primer_apellido): static
    {
        $this->primer_apellido = $primer_apellido;

        return $this;
    }

    public function getSegundoApellido(): ?string
    {
        return $this->segundo_apellido;
    }

    public function setSegundoApellido(?string $segundo_apellido): static
    {
        $this->segundo_apellido = $segundo_apellido;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fecha_nacimiento): static
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    public function getEdad(): ?string
    {
        return $this->edad;
    }

    public function setEdad(string $edad): static
    {
        $this->edad = $edad;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): static
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function isHijoDe(): ?bool
    {
        return $this->hijo_de;
    }

    public function setHijoDe(bool $hijo_de): static
    {
        $this->hijo_de = $hijo_de;

        return $this;
    }

    public function getNumeroIden(): ?string
    {
        return $this->numero_iden;
    }

    public function setNumeroIden(string $numero_iden): static
    {
        $this->numero_iden = $numero_iden;

        return $this;
    }

    public function getTipoDocumento(): ?TipoDocumento
    {
        return $this->tipo_documento;
    }

    public function setTipoDocumento(?TipoDocumento $tipo_documento): static
    {
        $this->tipo_documento = $tipo_documento;

        return $this;
    }

    public function getDepartamento(): ?Departamento
    {
        return $this->departamento;
    }

    public function setDepartamento(?Departamento $departamento): static
    {
        $this->departamento = $departamento;

        return $this;
    }


    public function getZonaResidencial(): ?string
    {
        return $this->zona_residencial;
    }

    public function setZonaResidencial(string $zona_residencial): static
    {
        $this->zona_residencial = $zona_residencial;

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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): static
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): static
    {
        $this->correo = $correo;

        return $this;
    }

    public function getAcudiente(): ?string
    {
        return $this->acudiente;
    }

    public function setAcudiente(string $acudiente): static
    {
        $this->acudiente = $acudiente;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(string $celular): static
    {
        $this->celular = $celular;

        return $this;
    }

  

    

   
    
    public function __toString() 
    {
       
    
        return $this->getNumeroIden();
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
            $datosClinico->setPacientes($this);
        }

        return $this;
    }

    public function removeDatosClinico(DatosClinicos $datosClinico): static
    {
        if ($this->datosClinicos->removeElement($datosClinico)) {
            // set the owning side to null (unless already changed)
            if ($datosClinico->getPacientes() === $this) {
                $datosClinico->setPacientes(null);
            }
        }

        return $this;
    }

    public function getTipoSangre(): ?GSanguineo
    {
        return $this->TipoSangre;
    }

    public function setTipoSangre(?GSanguineo $TipoSangre): static
    {
        $this->TipoSangre = $TipoSangre;

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

  




}
