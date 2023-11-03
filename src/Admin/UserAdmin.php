<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class UserAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
          
            ->add('username')
            ->add('roles')
            
            ->add('nombre')
            ->add('apellido')
            ->add('sexo')
         
            ->add('numero_docu')
           
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            
            ->add('username')
            ->add('roles')
            ->add('password')
            ->add('nombre')
            ->add('apellido')
            ->add('sexo')
            ->add('fecha_nacimiento')
            ->add('numero_docu')
            ->add('telefono')
            ->add('correo')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
        ->with('Datos Personales', [
            'class'       => 'col-md-6',
            'box_class'   => 'box box-solid box-primary',
            
        ])
           
            ->add('nombre',TextType::class)
            ->add('apellido',TextType::class)
            ->add('sexo')
            ->add('fecha_nacimiento',DateType::class, [
                'widget' => 'single_text' 
            ])
            ->add('tipo_documeto') 
            ->add('Numero_Docu',TextType::class)
            ->add('telefono',IntegerType::class)
           
            ->end()
            ->with('Datos Del Usuario', [
                'class'       => 'col-md-3',
                'box_class'   => 'box box-solid box-primary',
                
            ])
                ->add('username')
                ->add('correo',EmailType::class)
                ->add('password', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'first_options' => [
                        'label' => 'Contraseña',
                        'invalid_message' => 'las contraseñas no coinciden'
                    ],
                    'second_options' => [
                        'label' => 'Repite contraseña',
                        'invalid_message' => 'las contraseñas no coinciden'
                    ]
                ])
                
                ->end()
                ->with('Sedes', [
                    'class'       => 'col-md-3',
                    'box_class'   => 'box box-solid box-primary',
                    
                ])
                ->add('sedes', ModelType::class , [
                    'class' => 'App\Entity\Sedes',
                    'multiple' => true,
                    'required' => true,
                    'label' => 'Sedes',
                    'property' => 'nombre', // Reemplaza 'nombre' con el nombre de la propiedad que deseas mostrar en las casillas de verificación
                    'expanded' => true,
                    'by_reference' => true,
                   
                ])
                
                    ->end()
                    ->with('Administracion', [
                        'class'       => 'col-md-3',
                        'box_class'   => 'box box-solid ',
                        
                    ])
                    ->add('roles', ChoiceType::class , [
                        
                        'multiple' => true,
                        'required' => true,
                        'label' => 'Roles',
                        
                        'expanded' => true,
                       
                    ])
                        
                        ->end()
            ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
           
            ->add('username')
            ->add('roles')
            ->add('password')
            ->add('nombre')
            ->add('apellido')
            ->add('sexo')
            ->add('fecha_nacimiento')
            ->add('numero_docu')
            ->add('telefono')
            ->add('correo')
            ;
    }
}
