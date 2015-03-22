<?php

namespace Odysseus\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('civilite', 'choice', array(
                                            'choices'   => array('1' => 'M.', '2' => 'Mme'),
                                            'expanded'  => true,
                                            'required'  => true))
                ->add('prenom','text')
                ->add('nom','text')
                ->add('adresse',new AdresseType()) 
                ->add('dateNaissance','datetime')
                ->add('telephone', 'text', array('max_length' => 10))
                ->add('email', 'email');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Odysseus\FrontBundle\Entity\Client'
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
