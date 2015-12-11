<?php 

namespace Odysseus\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
//use Odysseus\UserBundle\Form\Type\ClientType;
//use Odysseus\UserBundle\Form\Type\AdresseType;

class ProfileFormType extends AbstractType
{
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
         $builder->add('username','text', array('required' => false))
                 ->add('email',   'email', array('required' => false));
                 //->add('client', new ClientType());
    } 

    
    
    public function getParent()
    {
        return 'fos_user_profile';
    }
    
    

    public function getName()
    {
        return 'odysseus_edition_profile';
    }

}
