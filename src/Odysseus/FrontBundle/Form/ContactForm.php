<?php

namespace Odysseus\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;

class ContactForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prenom', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Votre prénom',
                        'pattern'     => '.{2,}' //minlength
                    )
                ))
                ->add('nom', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Votre nom',
                        'pattern'     => '.{2,}' //minlength
                    )
                ))
                ->add('email', 'email', array(
                    'attr' => array(
                        'placeholder' => 'Votre e-mail'
                    )
                ))
                ->add('sujet', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Le sujet de votre message',
                        'pattern'     => '.{3,}' //minlength
                    )
                ))
                ->add('message', 'textarea', array(
                    'attr' => array(
                        'cols' => 70,
                        'rows' => 10,
                        'placeholder' => 'Ecrivez votre message ici'
                    )
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $collectionConstraint = new Collection(array(
            'prenom' => array(
                new NotBlank(array('message' => 'Prénom obligatoire.')),
                new Length(array('min' => 2))
            ),
            'nom' => array(
                new NotBlank(array('message' => 'Nom obligatoire.')),
                new Length(array('min' => 2))
            ),
            'email' => array(
                new NotBlank(array('message' => 'Email obligatoire.')),
                new Email(array('message' => 'Adresse email invalid.'))
            ),
            'subject' => array(
                new NotBlank(array('message' => 'Le sujet ne doit pas être vide.')),
                new Length(array('min' => 3))
            ),
            'message' => array(
                new NotBlank(array('message' => 'Votre message ne doit pas être vide..')),
                new Length(array('min' => 5))
            )
        ));

        $resolver->setDefaults(array(
            'constraints' => $collectionConstraint
        ));
    }

    public function getName()
    {
        return 'contact';
    }
}