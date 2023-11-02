<?php

namespace App\Form;

use App\Entity\Ciudad;

use App\Entity\Departamento;
use App\Entity\GSanguineo;
use App\Entity\Paciente;
use App\Entity\TipoDocumento;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PacienteType extends AbstractType
{


 
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
      
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero_iden', TextType::class, [
                'required' => true,

                'attr' => ['maxlength' => 12, 'class' => 'form-control ', 'placeholder' => 'Numero Identificacion'],

            ])
            ->add('Buscar', SubmitType::class)
            ->add('hijo_de')

            ->add('Primer_Nombre', TextType::class, [
                'required' => true,
                'label' => 'Primer Nombre ',
                'attr' => ['class' => 'form-control '],
            ])
            ->add('Segundo_Nombre', TextType::class, [
                'required' => false,

                'attr' => ['class' => 'form-control '],
            ])
            ->add('Primer_Apellido', TextType::class, [
                'required' => true,
                'label' => 'Primer Apellido ',
                'attr' => ['class' => 'form-control '],
            ])
            ->add('Segundo_Apellido', TextType::class, [
                'required' => false,

                'attr' => ['class' => 'form-control '],
            ])
            ->add('Fecha_Nacimiento', DateType::class, [
                'required' => true,

                'widget' => 'single_text',
                'attr' => [
                    'max' => (new \DateTime())->format('Y-m-d'), // Establece la fecha máxima al día de hoy
                    'class' => 'form-control bootstrap-datetimepicker-widget',
                ],
                #'data' => new \DateTime()
            ])
            ->add('Edad', TextType::class, [
                'required' => true,

                'attr' => [
                    'readonly' => true, // Hace que el campo de Edad sea de solo lectura
                    'class' => 'form-control ',
                ],
            ])
            ->add('Sexo', ChoiceType::class, array(

                'choices' => array(
                    'Seleccione' => '',
                    'Masculino' => 'Masculino',
                    'Femenino' => 'Femenino'
                ),
                'required'    => true,
                'attr' => ['class' => 'form-control '],
                'expanded' => false,
                'label' => 'Sexo ',


            ))
            ->add('Tipo_Documento', EntityType::class, [
                'class' => TipoDocumento::class, // Reemplaza AppBundle\Entity\con la clase real de tu entidad
                'choice_label' => 'tipo_documento', // Reemplaza 'nombre' con el atributo que quieres mostrar en el select box
                'required' =>true,
               
                'attr' => ['class' => 'form-control'],
                'label' => 'Tipo Documento ',
                'placeholder' => 'Seleccione',
            ])
            ->add('TipoSangre', EntityType::class, [
                'class' => GSanguineo::class,
                'choice_label' => 'nombre',
                'label'=>'Grupo Sanguineo',
                'required'=>false,
                'placeholder' => 'NO DEFINIDO',
                'attr' => ['class' => 'form-control',],

            ])

            ->add('direccion', TextType::class, [
                'required' => false,

                'attr' => ['class' => 'form-control '],
            ])
            ->add('telefono', TextType::class, [
                'required' => true,

                'attr' => ['class' => 'form-control '],
            ])
            ->add('celular', TextType::class, [
                'required' => false,

                'attr' => ['class' => 'form-control '],
            ])

            ->add('correo', TextType::class, [
                'required' => false,

                'attr' => ['class' => 'form-control '],
            ])
            ->add('acudiente', TextType::class, [
                'required' => false,

                'attr' => ['class' => 'form-control '],
            ])
            ->add('zona_residencial', ChoiceType::class, array(


                'choices' => [
                    'Seleccione' => '',
                    'Urbana' => 'Urbana',
                    'Rural' => 'Rural',
                ],
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'attr' => ['class' => 'form-control radio-input '],

            ))


            ->add('Actualizar_Seleccionar', SubmitType::class, [
                'label' => 'Actualizar / Seleccionar Paciente',
            ])

            ->add('departamento', EntityType::class, [
                'class' => Departamento::class,
                'required' => true,
                'data' => $this->entityManager->getRepository(Departamento::class)->findOneBy(['departamento' => 'SUCRE']),
            ])
            
            ->add('ciudad', EntityType::class, [
                'class' => Ciudad::class, // Reemplaza con la clase real de tu entidad Ciudad
                'label' => 'Ciudad',
                'required' => true,
                'data' => $this->entityManager->getRepository(Ciudad::class)->findOneBy(['ciudad' => 'Sincelejo']),

            ]);
           
                   
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paciente::class,
        ]);
    }
}
