<?php

namespace App\Entity;

use App\Repository\ReporteRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
#[ORM\Entity(repositoryClass: ReporteRepository::class)]
#[Vich\Uploadable]

class Reporte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

  

    #[ORM\Column]
    private ?int $margen_derecho = null;

    #[ORM\Column]
    private ?int $margen_izquierdo = null;
    #[ORM\Column]
    private ?int $margen_superior = null;

    #[ORM\Column]
    private ?int $margen_inferior = null;

    #[ORM\Column]
    private ?bool $cabezera = null;

    #[Vich\UploadableField(mapping: 'reporte', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'reportes')]
    private ?Sedes $sede = null;
    
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMargenSuperior(): ?int
    {
        return $this->margen_superior;
    }

    public function setMargenSuperior(int $margen_superior): static
    {
        $this->margen_superior = $margen_superior;

        return $this;
    }

    public function getMargenInferior(): ?int
    {
        return $this->margen_inferior;
    }

    public function setMargenInferior(int $margen_inferior): static
    {
        $this->margen_inferior = $margen_inferior;

        return $this;
    }

    public function getMargenDerecho(): ?int
    {
        return $this->margen_derecho;
    }

    public function setMargenDerecho(int $margen_derecho): static
    {
        $this->margen_derecho = $margen_derecho;

        return $this;
    }

    public function getMargenIzquierdo(): ?int
    {
        return $this->margen_izquierdo;
    }

    public function setMargenIzquierdo(int $margen_izquierdo): static
    {
        $this->margen_izquierdo = $margen_izquierdo;

        return $this;
    }

    public function isCabezera(): ?bool
    {
        return $this->cabezera;
    }

    public function setCabezera(bool $cabezera): static
    {
        $this->cabezera = $cabezera;

        return $this;
    }
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function getSede(): ?Sedes
    {
        return $this->sede;
    }

    public function setSede(?Sedes $sede): static
    {
        $this->sede = $sede;

        return $this;
    }
    
   
}
