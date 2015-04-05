<?php

namespace Odysseus\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdressePanierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', 'choice', array(
                                        'choices' => array('0' => 'Facturation',
                                                           '1' => 'Livraison')))
                ->add('adresse')
                ->add('cp')
                ->add('ville')
                ->add('pays');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Odysseus\FrontBundle\Entity\Adresse'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'odysseus_frontbundle_adresse';
    }
}
