<?php

namespace Facturas\FacturasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FacturasBundle:Default:index.html.twig', array('name' => $name));
    }
}
