<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2/1/2016
 * Time: 15:27
 */

namespace Restaurant\RstaurantBundle\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use Restaurant\UserBundle\Entity\Province;

class MunicipalityController extends FOSRestController{
    public function getMunicipalityAction() {
        //return json_encode(array("asdasd"));
        $repository = $this->getDoctrine()
          ->getRepository('UserBundle:Municipality');
        return $repository->findAll();
    }
}