<?php
/**
 * Created by PhpStorm.
 * User: Hector Reyes
 * Date: 31/12/2015
 * Time: 11:52
 */

namespace Restaurant\RstaurantBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller{

  public function indexAction() {
    return $this->render('RstaurantBundle:Admin:dashboard.html.twig');
  }

  public function getAllProvince() {
    return json_encode(array('data'));
  }

}