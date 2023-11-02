<?php

namespace App\Entity;

use App\Repository\DatosClinicosRepository;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: DatosClinicosRepository::class)]
#[Vich\Uploadable]
class DatosClinicos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $medico_remitente = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Tarjeta_Profesional = null;
    #[ORM\Column(length: 4)]
    private ?string $info_clinica = null;
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_estudio = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $hora_estudio = null;

    #[ORM\ManyToOne(inversedBy: 'datosClinicos')]
    private ?Convenio $convenio = null;

    #[ORM\ManyToOne(inversedBy: 'datosClinicos')]
    private ?Paciente $pacientes = null;

    #[ORM\ManyToOne(inversedBy: 'datosClinicos')]
    private ?Salas $sala = null;

    #[ORM\ManyToOne(inversedBy: 'datosClinicos')]
    private ?PrioridadCita $prioridad = null;

    #[ORM\ManyToOne(inversedBy: 'datosClinicos')]
    private ?ProcedenciaCita $procedencia = null;

    #[ORM\ManyToOne(inversedBy: 'datosClinicos')]
    private ?Modalidad $modalidad = null;

    #[ORM\ManyToOne(inversedBy: 'datosClinicos')]
    private ?Estudios $tipo_estudio = null;

    #[ORM\ManyToOne(inversedBy: 'datosClinicos')]
    private ?User $medico_asignado = null;

    #[ORM\Column(length: 255)]
    private ?string $archivos = null;

    #[ORM\Column(length: 255)]
    private ?string $estado = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicoRemitente(): ?string
    {
        return $this->medico_remitente;
    }

    public function setMedicoRemitente(?string $medico_remitente): static
    {
        $this->medico_remitente = $medico_remitente;

        return $this;
    }

    public function getTarjetaProfesional(): ?string
    {
        return $this->Tarjeta_Profesional;
    }

    public function setTarjetaProfesional(?string $Tarjeta_Profesional): static
    {
        $this->Tarjeta_Profesional = $Tarjeta_Profesional;

        return $this;
    }

   


 

    public function getInfoClinica(): ?string
    {
        return $this->info_clinica;
    }

    public function setInfoClinica(string $info_clinica): static
    {
        $this->info_clinica = $info_clinica;

        return $this;
    }

   


    public function getTipoEstudio(): ?Estudios
    {
        return $this->tipo_estudio;
    }

    public function setTipoEstudio(?Estudios $tipo_estudio): static
    {
        $this->tipo_estudio = $tipo_estudio;

        return $this;
    }


    public function __toString()
    {
  return 'DatosClinicos';
    }

   

    public function getFechaEstudio(): ?\DateTimeInterface
    {
        return $this->fecha_estudio;
    }

    public function setFechaEstudio(\DateTimeInterface $fecha_estudio): static
    {
        $this->fecha_estudio = $fecha_estudio;

        return $this;
    }

    public function getHoraEstudio(): ?\DateTimeInterface
    {
        return $this->hora_estudio;
    }

    public function setHoraEstudio(\DateTimeInterface $hora_estudio): static
    {
        $this->hora_estudio = $hora_estudio;

        return $this;
    }

    public function getConvenio(): ?Convenio
    {
        return $this->convenio;
    }

    public function setConvenio(?Convenio $convenio): static
    {
        $this->convenio = $convenio;

        return $this;
    }

    public function getPacientes(): ?Paciente
    {
        return $this->pacientes;
    }

    public function setPacientes(?Paciente $pacientes): static
    {
        $this->pacientes = $pacientes;

        return $this;
    }

    public function getSala(): ?Salas
    {
        return $this->sala;
    }

    public function setSala(?Salas $sala): static
    {
        $this->sala = $sala;

        return $this;
    }

    public function getPrioridad(): ?PrioridadCita
    {
        return $this->prioridad;
    }

    public function setPrioridad(?PrioridadCita $prioridad): static
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    public function getProcedencia(): ?ProcedenciaCita
    {
        return $this->procedencia;
    }

    public function setProcedencia(?ProcedenciaCita $procedencia): static
    {
        $this->procedencia = $procedencia;

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

    public function getMedicoAsignado(): ?User
    {
        return $this->medico_asignado;
    }

    public function setMedicoAsignado(?User $medico_asignado): static
    {
        $this->medico_asignado = $medico_asignado;

        return $this;
    }

    public function getArchivos(): ?string
    {
        return $this->archivos;
    }

    public function setArchivos(string $archivos): static
    {
        $this->archivos = $archivos;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

 



	
}
