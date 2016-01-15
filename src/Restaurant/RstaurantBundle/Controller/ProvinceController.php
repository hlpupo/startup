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
use Restaurant\RstaurantBundle\Form\Type\ProvinceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ProvinceController extends FOSRestController {
  public function getProvinceAction() {
    //return json_encode(array("asdasd"));
    $repository = $this->getDoctrine()
      ->getRepository('UserBundle:Province');
    return $repository->findAll();
  }

  public function getProvinceFormAction() {

    $form = $this->createForm(new ProvinceType(), new Province());
    //return new Response($form->createView());
    ///  $view = $this->view($form->createView(), 200);
    //return $this->handleView($view);
    //return $view;


    /*$view = $this->view($form->createView(), 200)
      ->setTemplate("RstaurantBundle:Admin:form:modalForm.html.twig");

    return $this->handleView($view);*/

    $view = new View($form->createView());
    $view->setTemplate('RstaurantBundle:Admin:foram:modalForm.html.twig');

    return $this->get('fos_rest.view_handler')->handle($view);

    //return $form;
  }

  /**
   * @param Request $request
   * @ApiDoc(
   *  resource = true,
   *  description = "Send Data Province",
   *  statusCodes = {
   *    200 = "",
   *    404 = ""
   *  }
   * )
   */
  public function postProvinceForm(Request $request) {
    $form = $this->getForm();
    $form->handleRequest($request);
    if ($form->isValid()) {

    } else {

    }

  }

  /**
   * Create intance of Class Entity Provinces
   * @param $prov name of province
   * @return Province
   */
  public function createProvince($prov) {
    $province = new Province();
    $province->setName($prov);
    return $province;
  }

  public function getForm($province = null) {
    if (is_null($province)) {
      $province = new Province();
    }
    return $this->createForm(new ProvinceType(), $province);
  }
}