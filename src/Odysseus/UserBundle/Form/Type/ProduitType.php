<?php

namespace Odysseus\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProduitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('reference', 'text', array('required' => false))
                 ->add('nom',       'text')
                 ->add('marque',    'text')
                 ->add('categorie', 'entity', array(
                                'class'    => 'OdysseusFrontBundle:Categorie',
                                'property' => 'nom',
                                'multiple' => false,
                                ))
                 //optionnelle selon la categorie choisie
                 ->add('souscategorie')
                 ->add('souscategorie', 'entity', array(
                                'class'    => 'OdysseusFrontBundle:Souscategorie',
                                'property' => 'nom',
                                'multiple' => false,
                                ))
                ->add('description', 'textarea');
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Odysseus\FrontBundle\Entity\Produit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'odysseus_backbundle_produitcataloguetype';
    }
}
