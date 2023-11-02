<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

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
           
            ->add('username')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_RECEPCION' => 'ROLE_RECEIVER',
                    'ROLE_TECNOLOGO' => 'ROLE_TECNO',
                    'ROLE_RADIOLOGY'=>'ROLE_RADIOLOGY',
                    // Agrega más roles según tu caso
                ],
                'multiple' => true, // Puedes usar true si quieres permitir múltiples selecciones
                'expanded' => true, // Puedes usar true si quieres mostrar casillas de verificación en lugar de una lista desplegable
            ])
            ->add('password')
            ->add('nombre')
            ->add('apellido')
            ->add('sexo')
            
            ->add('fecha_nacimiento', DateType::class, [
                'required' => true,

                'widget' => 'single_text',
                'attr' => [
                    'max' => (new \DateTime())->format('Y-m-d'), // Establece la fecha máxima al día de hoy
                 
                ],
              
            ])
            ->add('numero_docu')
            ->add('telefono')
            ->add('correo')
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
