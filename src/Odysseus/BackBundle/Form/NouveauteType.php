<?php

namespace Odysseus\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Odysseus\FrontBundle\Entity\ProduitVente;

class NouveauteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('produit', 'entity', array(
                        'class' => 'FrontBundle:ProduitVente',
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('p'); //->orderBy('p.dateAjout', 'ASC');
                }));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'odysseus_backbundle_nouveautetype';
    }
    
}
