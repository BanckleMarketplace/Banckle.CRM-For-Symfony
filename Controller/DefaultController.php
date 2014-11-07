<?php

namespace Banckle\Bundle\CRMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BanckleCRMBundle:Default:index.html.twig', array('name' => $name));
    }
}
