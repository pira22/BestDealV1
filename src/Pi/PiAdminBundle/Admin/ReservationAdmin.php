<?php

namespace Pi\PiAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ReservationAdmin extends Admin {

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('id')
                ->add('$dateres','date')
                ->add('valid')
                ->add('client','entity',array('class'=>'PiPiAdminBundle:Client'))
                ->add('dealRef','entity',array('class'=>'PiPiAdminBundle:Deal'))
               


        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('id')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('$dateres','date')
                ->add('valid')
               ->add('client','entity',array('class'=>'PiPiAdminBundle:Client'))
                ->add('dealRef','entity',array('class'=>'PiPiAdminBundle:Deal'))
               
        ;
    }

}
