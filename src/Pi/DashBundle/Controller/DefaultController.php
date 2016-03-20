<?php

namespace Pi\DashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PiDashBundle:Default:index.html.twig', array('name' => $name));
    }
}
