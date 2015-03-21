<?php

namespace Odysseus\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Odysseus\FrontBundle\Repository\EtatRepository;

class ProduitVenteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('remarque', 'text', array('required' => false))
                 ->add('prix',     'money')
                 ->add('stock',    'integer')
                 ->add('etat', 'entity', array(
                                'class'    => 'OdysseusFrontBundle:Etat',
                                'property' => 'nom',
                                'multiple' => false,
                                'query_builder' => function(EtatRepository $er){
                                    return $er->getListeEtatpourProduit();
                                })); 
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Odysseus\FrontBundle\Entity\ProduitVente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'odysseus_backbundle_produitventetype';
    }
}
