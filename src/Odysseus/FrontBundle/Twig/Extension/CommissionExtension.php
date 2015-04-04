<?php

namespace Odysseus\FrontBundle\Twig\Extension;

class CommissionExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('commission', array($this, 'calculCommission')));
    }
    
    
    public function calculCommission($prix, $pourcentage)
    {
        return $prix * $pourcentage;
    }
    
    public function getName()
    {
        return 'commision_extension';
    }
}
