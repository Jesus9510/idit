<?php

namespace App\Form;

use App\Entity\DatosClinicos;
use App\Form\PacienteType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\User;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
class DatosClinicosType extends AbstractType
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
      
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            ->add('medico_remitente')
            ->add('Tarjeta_Profesional')
            ->add('info_clinica', ChoiceType::class, [

                'choices' => [
                    'Seleccione' => '',
                    'Si' => 'Si',
                    'No' => 'No',
                ],
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'label' => 'Trae información clínica',
                'attr' => ['class' => 'form-control'],
            ])
            
            ->add('prioridad', EntityType::class, [
                'class' => 'App\Entity\PrioridadCita',
                'label' => 'Prioridad',
                'required' => false,
                'placeholder' => 'Seleccione',
            ])
            ->add('procedencia', EntityType::class, [
                'class' => 'App\Entity\ProcedenciaCita',
                'label' => 'Procedencia',
                'required' => false,
                'placeholder' => 'Seleccione',
            ])
            ->add('medico_asignado', EntityType::class, [
                'class' => 'App\Entity\User',
                'label' => 'Medico Asignado (*)',
                'required' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->Where('u.roles LIKE :desiredRoleRadio OR u.roles LIKE :desiredRoleTecnologo')
                        ->setParameter('desiredRoleRadio', '%"ROLE_RADIOLOGY"%')
                        ->setParameter('desiredRoleTecnologo', '%"ROLE_TECNO"%');
                },
                'choice_label' => function ($user) {
                    return $user->getNombre() . ' ' . $user->getApellido(); // Cambia los métodos para obtener los valores correctos
                },
                'data' => $this->entityManager->getRepository(User::class)->findOneBy(['nombre' => 'DE TURNO']),
            ])
            ->add('convenio', EntityType::class, [
                'class' => 'App\Entity\Convenio',
                'label' => 'Convenio',
                'required' => false,
                'placeholder' => 'Seleccione',
            ])
            ->add('modalidad', EntityType::class, [
                'class' => 'App\Entity\Modalidad', // Reemplaza AppBundle\Entity\Departamento con la clase real de tu entidad Departamento
                'label' => 'Modalidad', // Reemplaza 'nombre' con el atributo de Departamento que quieres mostrar en el select box
                'required' => false,
                'placeholder' => 'Seleccione',

            ])
            ->add('tipo_estudio', EntityType::class, [
                'class' => 'App\Entity\Estudios',
                'label' => 'Estudio',
                'required' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('e')
                        ->Where('e.activo = :estado')
                        ->setParameter('estado', 1)
                        ->orderBy('e.nombre', 'ASC'); // Puedes ordenar las opciones según tus preferencias
                },
            ])
            ->add('sala', EntityType::class, [
                'class' => 'App\Entity\Salas',
                'label' => 'Sala',
                'required' => false,
               
            ])
            ->add('pacientes', EntityType::class, [
                'class' => 'App\Entity\Paciente', // Reemplaza con la clase real de tu entidad Paciente
                'label' => 'Paciente',
                'required' => true,
                'attr' => ['class' => 'form-control'],
            ])
            
            ->add('archivos', FileType::class, [
                'label'=>'Orden Medica Y Datos Clinicos',

              
                'mapped' => false,
 
                'required' => false,

               
            ])
            
        
            
            ->add('Cancelar',SubmitType::class,['attr' => ['class' => 'btn btn-danger']],
            )
            ->add('Enviar_A_Flujo_De_Imagen', SubmitType::class, ['attr' => ['class' => 'btn btn-success']],)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DatosClinicos::class,
        ]);
    }
}
