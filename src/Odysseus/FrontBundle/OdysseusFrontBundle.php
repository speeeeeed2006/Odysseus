<?php

namespace Odysseus\FrontBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OdysseusFrontBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
