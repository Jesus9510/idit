<?php

declare(strict_types=1);

namespace App\Admin;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class PlantillaAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            
            ->add('nombre')
            ->add('plantilla')
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
          
        ->addIdentifier('nombre')
            ->add('plantilla')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
           
            ->add('nombre')
            ->add('plantilla', CKEditorType::class, array(
                'config' => array(
                    'toolbar' => 'full',
                    'auto_paragraph' => false,
                ),
            ));
            ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
           
            ->add('nombre')
            ->add('plantilla')
            ;
    }
}
