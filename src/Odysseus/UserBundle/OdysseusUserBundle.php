<?php

namespace Odysseus\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OdysseusUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}


