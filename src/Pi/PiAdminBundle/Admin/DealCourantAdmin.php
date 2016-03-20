<?php

// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Pi\PiAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class DealCourantAdmin extends Admin {

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
              
                ->add('date','date')
                ->add('dealRef','entity',array('class'=>'PiPiAdminBundle:Deal')) 
               


        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('id')
                ->add('dealRef','entity',array('class'=>'PiPiAdminBundle:Deal')) 

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('date','date')
                ->add('dealRef','entity',array('class'=>'PiPiAdminBundle:Deal')) 
               
        ;
    }

}