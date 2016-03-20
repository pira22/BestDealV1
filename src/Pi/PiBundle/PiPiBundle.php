<?php

namespace Pi\PiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PiPiBundle extends Bundle
{
   public function getParent()
    {
        return 'FOSUserBundle';
    } 
}
