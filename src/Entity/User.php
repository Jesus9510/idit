<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
#[Vich\Uploadable]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $apellido = null;

    #[ORM\Column(length: 255)]
    private ?string $sexo = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_nacimiento = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_docu = null;

    #[ORM\Column(length: 255)]
    private ?string $telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $correo = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?TipoDocumento $tipo_documeto = null;

    #[ORM\OneToMany(mappedBy: 'usuario', targetEntity: Plantilla::class)]
    private Collection $plantillas;

    #[ORM\OneToMany(mappedBy: 'medico_asignado', targetEntity: DatosClinicos::class)]
    private Collection $datosClinicos;
    #[Vich\UploadableField(mapping: 'firma', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $registro_medico = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?EspecialidadMedico $especialidad = null;

    #[ORM\ManyToMany(targetEntity: Sedes::class, inversedBy: 'users')]
    private Collection $sedes;


    public function __construct()
    {
        $this->plantillas = new ArrayCollection();
        $this->datosClinicos = new ArrayCollection();
        $this->sedes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = '';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;

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

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fecha_nacimiento): static
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    public function getNumeroDocu(): ?string
    {
        return $this->numero_docu;
    }

    public function setNumeroDocu(string $numero_docu): static
    {
        $this->numero_docu = $numero_docu;

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

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): static
    {
        $this->correo = $correo;

        return $this;
    }

    public function getTipoDocumeto(): ?TipoDocumento
    {
        return $this->tipo_documeto;
    }

    public function setTipoDocumeto(?TipoDocumento $tipo_documeto): static
    {
        $this->tipo_documeto = $tipo_documeto;

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
            $plantilla->setUsuario($this);
        }

        return $this;
    }

    public function removePlantilla(Plantilla $plantilla): static
    {
        if ($this->plantillas->removeElement($plantilla)) {
            // set the owning side to null (unless already changed)
            if ($plantilla->getUsuario() === $this) {
                $plantilla->setUsuario(null);
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
            $datosClinico->setMedicoAsignado($this);
        }

        return $this;
    }

    public function removeDatosClinico(DatosClinicos $datosClinico): static
    {
        if ($this->datosClinicos->removeElement($datosClinico)) {
            // set the owning side to null (unless already changed)
            if ($datosClinico->getMedicoAsignado() === $this) {
                $datosClinico->setMedicoAsignado(null);
            }
        }

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

    public function getRegistroMedico(): ?string
    {
        return $this->registro_medico;
    }

    public function setRegistroMedico(?string $registro_medico): static
    {
        $this->registro_medico = $registro_medico;

        return $this;
    }

    public function getEspecialidad(): ?EspecialidadMedico
    {
        return $this->especialidad;
    }

    public function setEspecialidad(?EspecialidadMedico $especialidad): static
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    /**
     * @return Collection<int, Sedes>
     */
    public function getSedes(): Collection
    {
        return $this->sedes;
    }

    public function addSede(Sedes $sede): static
    {
        if (!$this->sedes->contains($sede)) {
            $this->sedes->add($sede);
        }

        return $this;
    }

    public function removeSede(Sedes $sede): static
    {
        $this->sedes->removeElement($sede);

        return $this;
    }
    public function __toString()
    {
        return $this->username; // Reemplaza 'nombre' con el atributo que deseas mostrar
    }
}
