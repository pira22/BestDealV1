<?php

namespace Mail\MailBundle\Controller;

use Sonata\AdminBundle\Admin\AdminInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function indexAction() {
         $blocks = array(
            'top'    => array(),
            'left'   => array(),
            'center' => array(),
            'right'  => array(),
            'bottom' => array()
        );

        foreach ($this->container->getParameter('sonata.admin.configuration.dashboard_blocks') as $block) {
            $blocks[$block['position']][] = $block;
        }

       

 $request = $this->get('request');
        $subject="Réclamation";
        $msg = $request->get('msg');
        $email = $request->get('adr');
        
        $message = \Swift_Message::newInstance()
                 ->setSubject($subject)
                ->setBody($msg)
                ->setFrom('aymen.talbi@esprit.tn')
                ->setTo($email)
              


        ;
        $this->get('mailer')->send($message);
       return $this->render('MailMailBundle:Default:index.html.twig',array(
            'admin_pool'      => $this->container->get('sonata.admin.pool'),
            'blocks'          => $blocks));


}}
