<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Pi\PiAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class DealAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nom')
            ->add('quantite')
            ->add('datedebut','date')
            ->add('datefin','date')
            ->add('tauxred')
            ->add('description')
            ->add('x')
            ->add('y')
            ->add('chemin','file' ,array(
                'data_class' => null
            ))
            ->add('prix1')
            ->add('categorie','entity',array('class'=>'Pi\PiAdminBundle\Entity\categorie'))
            ->add('vendeur','entity',array('class'=>'Pi\PiAdminBundle\Entity\Vendeur'))     
                
                ;
    }
  

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom', null, array(
                'route' => array('nom' => 'create')
            ))
            ;
    }
}