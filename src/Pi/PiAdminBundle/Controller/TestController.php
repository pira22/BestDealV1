<?php

namespace Pi\PiAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pi\PiBundle\Entity\Contact;
use Pi\PiBundle\Entity\Newslettre;
use Symfony\Component\HttpFoundation\Request;
use Pi\PiBundle\Form\ContactType;
use Pi\PiBundle\Form\NewslettreType;


class TestController extends Controller
{
    public function indexAction()
    {
       
       return $this->render('PiPiAdminBundle:Test:index.html.twig');
    }
    
}
