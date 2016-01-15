<?php

namespace Restaurant\RstaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //return $this->render('RstaurantBundle:Default:index.html.twig', array('name' => $name));
        return $this->render('RstaurantBundle:Default:portada.html.twig');
    }
}
