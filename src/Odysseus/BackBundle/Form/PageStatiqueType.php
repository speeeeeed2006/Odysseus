<?php

namespace Odysseus\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageStatiqueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',    'text')
            ->add('contenu', 'textarea', array('attr' => array('class' => 'ckeditor')))
            ->add('slug', 'text');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Odysseus\FrontBundle\Entity\Pagestatique'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'odysseus_backbundle_pagestatiquetype';
    }
}
