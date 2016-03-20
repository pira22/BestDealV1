<?php

namespace Pi\PiBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('nom')
                ->add('prenom')
                ->add('adresse')
                ->add('numtel');
    }

    public function getName()
    {
        return 'pi_pibundle_registration';
    }
}