<?php

namespace Odysseus\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Odysseus\UserBundle\Form\Type\AdresseType;

class ClientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('civilite', 'choice', array(  'choices'   => array('0' => 'M.', '1' => 'Mme' ),
                                                    'required'  => true))
            ->add('prenom','text')
            ->add('nom','text')
            ->add('dateNaissance','birthday')
            ->add('telephone', 'text', array('max_length' => 10))
            ->add('email', 'email')
           /* ->add('adresse', 'collection', array('type' => new AdresseType()))*/;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Odysseus\UserBundle\Entity\User',
            'cascade_validation' => true
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'odysseus_userbundle_client';
    }
}
