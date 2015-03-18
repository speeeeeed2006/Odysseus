<?php

namespace Odysseus\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Odysseus\FrontBundle\Repository\EtatRepository;

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
                ->add('description', 'textarea')
                        //filter que ceux liés au produit
                ->add('etat', 'entity', array(
                                'class'    => 'OdysseusFrontBundle:Etat',
                                'property' => 'nom',
                                'multiple' => false,
                                'query_builder' => function(EtatRepository $er){
                                    return $er->getListeEtatpourProduitCat();
                                }))
                ->add('promotion', 'checkbox', array('required' => false))
                ->add('nouveaute', 'checkbox', array('required' => false))
                ->add('alaune', 'checkbox', array('required' => false));
        
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
