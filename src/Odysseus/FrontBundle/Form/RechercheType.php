<?php

namespace Odysseus\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('recherche', 'text', array('attr' => array('id' => 'recherche')) );
    }

    public function getName()
    {
        return 'odysseus_front_recherche';
    }
}