<?php

namespace Restaurant\RstaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RestaurantController extends Controller
{
    public function indexAction()
    {
        return $this->render('RstaurantBundle:Restaurant:restaurant.html.twig');
    }
}