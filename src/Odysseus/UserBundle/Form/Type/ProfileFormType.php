<?php 

namespace Odysseus\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ProfileFormType extends AbstractType
{
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildUserForm($builder, $options);
        
        $builder->add('username', 'text')
                ->add('client', new ClientType());
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
