<?php

namespace Pi\PiBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Pi\PiBundle\Entity\User;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileFormType extends BaseType
{
   

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $child = $builder->create('user', 'form', array('data_class' => 'Pi\PiBundle\Entity\User'));
        $this->buildUserForm($child, $options);
       
        $builder->add($child)
                ->add('nom')
                ->add('prenom')
                ->add('adresse')
                ->add('numtel');
    }
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'FOS\UserBundle\Form\Model\CheckPassword');
    }

    public function getName()
    {
        return 'pi_pibundle_edit';
    }
    
}