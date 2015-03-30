<?php

namespace Odysseus\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('username', 'text')
                ->add('email', 'email')
                ->add('password', 'password')
            ->add('client', new \Odysseus\BackBundle\Form\ClientType()); 
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Odysseus\UserBundle\Entity\User'
        ));
    }
    
    public function getParent()
    {
        return 'fos_user_registration';
    }


    public function getName()
    {
        return 'odysseus_user_registration';
    }
}