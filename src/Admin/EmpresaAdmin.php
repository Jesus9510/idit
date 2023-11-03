<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

final class EmpresaAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
           
            ->add('nombre')
            ->add('nit')
            ->add('email')
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
           
        ->addIdentifier('nombre', null, [
            'route' => ['name' => 'edit'], 
        ])
            ->add('nit')
            ->add('email')
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
            ->add('nit')
            ->add('email', EmailType::class, [
                'required' => false,
            ]);
            ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
           
            ->add('nombre')
            ->add('nit')
            ->add('email')
            ;
    }
}
