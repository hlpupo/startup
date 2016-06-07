<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 31/1/2016
 * Time: 10:15
 */

namespace Restaurant\RstaurantBundle\Controller;



use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Restaurant\UserBundle\Entity\Province;
use Restaurant\RstaurantBundle\Form\Type\ProvinceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RestaurantApiController extends FOSRestController{
  /**
   * @ApiDoc(
   *  resource = true,
   *  description = "Return the province for each municipality",
   *  statusCodes = {
   *    200 = "Returned when successful",
   *    400 = "Returned when the form has errors"
   *  }
   * )
   */
  public function getProvinceMunicipalityAction(){
    $return = array();
    $province = $this->getDoctrine()->getRepository('UserBundle:Province')->findAll();
    foreach($province as $prov) {
     $mun =  $this->getDoctrine()->getRepository('UserBundle:Municipality')
         ->findBy(array('province' => $prov->getProvinceid()));
      $return[] = array(
          'provinceID' => $prov->getProvinceid(),
          'provinceName' => $prov->getName(),
          'municipality' => $mun);
    }
    return $return;
  }

  public function postRegisterUserAction(Request $request){

  }
}