<?php

namespace Odysseus\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class MultiAdresseType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'adresse', 'collection', array('type' => new Odysseus\UserBundle\Form\Type\AdresseType())
        );
    }

    public function getName()
    {
        return 'multi_odysseus_userbundle_adresse';
    }
}
