<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;

final class ReporteAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
           
            ->add('margen_derecho')
            ->add('margen_izquierdo')
            ->add('margen_superior')
            ->add('margen_inferior')
            ->add('cabezera')
            ->add('imageName')
          
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
           
            ->add('margen_derecho')
            ->add('margen_izquierdo')
            ->add('margen_superior')
            ->add('margen_inferior')
            ->add('cabezera')
            ->add('imageName')
          
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
            
            ->add('margen_derecho')
            ->add('margen_izquierdo')
            ->add('margen_superior')
            ->add('margen_inferior')
            ->add('cabezera')
            ->add('imageName',FileType::class)
            
            ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
           
            ->add('margen_derecho')
            ->add('margen_izquierdo')
            ->add('margen_superior')
            ->add('margen_inferior')
            ->add('cabezera')
            ->add('imageName')
          
            ;
    }
}
