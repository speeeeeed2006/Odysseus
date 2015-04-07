<?php

namespace Odysseus\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdresseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse',    'text')
            ->add('type',    'choice', array(  'choices'   => array('0' => 'Livraison', '1' => 'Facturation' ),
                                                    'required'  => true))
            ->add('cp', 'integer', array('max_length' => 5))
            ->add('ville','text')
            ->add('pays','text');
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
        return 'odysseus_userbundle_adresse';
    }
}
