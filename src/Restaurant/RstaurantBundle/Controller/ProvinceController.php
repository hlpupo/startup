<?php
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

class ProvinceController extends FOSRestController {


  public function getProvinceAction() {
    $repository = $this->getDoctrine()->getRepository('UserBundle:Province');
    return $repository->findAll();
  }

  /**
   * @param Request $request
   * @ApiDoc(
   *  resource = true,
   *  description = "Sen new Province",
   *  statusCodes = {
   *    200 = "Returned when successful",
   *    400 = "Returned when the form has errors"
   *  }
   * )
   * @return View
   */
  public function postProvinceAction(\Symfony\Component\HttpFoundation\Request $request) {
    $em = $this->getDoctrine()->getManager();
    $view = View::create();
    $province = new Province();
    $form = $this->createForm(new ProvinceType(), $province);
    $form->handleRequest($request);
    if ($form->isValid()) {
      $em->persist($province);
      $em->flush();
      return $view->setStatusCode(codes::HTTP_CREATED);
    } else {
      return $view->setStatusCode(Codes::  HTTP_BAD_REQUEST)->setData($form->serialixeFormErros());
    }
  }

  /**
   * @param Request $request
   * @return View
   * @ApiDoc(
   *  resource = true,
   *  description = "Delete Province",   *
   *  statusCodes = {
   *    200 = "Returned when successful",
   *    404 = "Returned when the Province not found"
   *  }
   * )
   */
  public function deleteProvinceAction(Request $request) {
    $view = View::create();
    $provR = $this->getDoctrine()
        ->getRepository('UserBundle:Province')
        ->find( $request->get('id'));
    $em = $this->getDoctrine()->getManager();
    if(!empty($provR)) {
      $em->remove($provR);
      $em->flush();
      return $view->setStatusCode(codes::HTTP_ACCEPTED)->setData(array('status' => true, 'info' => 'Delete Province'));
    } else {
      return $view->setStatusCode(codes::HTTP_NOT_FOUND)->setData(array('status' => false, 'info' => 'Delete Province'));
    }
  }

  public function postProvinceFindAction(Request $request) {
    $view = View::create();
    if(!empty($request->get('id'))) {
      $provR = $this->getDoctrine()
          ->getRepository('UserBundle:Province')
          ->findBy(array('provinceid' => $request->get('id')));
    } else {
      $provR = $this->getDoctrine()
          ->getRepository('UserBundle:Province')
          ->findBy(array('name' => $request->get('name')));
    }
    return $view->setStatusCode(codes::HTTP_ACCEPTED)->setData(array('data' => $provR));
  }

  public function putProvinceAction(Request $request) {
    $provR = $this->getDoctrine()
        ->getRepository('UserBundle:Province')
        ->findBy(array('provinceid' => $request->get('id')));
    $view = View::create();
    $em = $this->getDoctrine()->getManager();
    if($provR) {
      $provR->setName($request->get('name'));
      $form = $this->createForm(new ProvinceType(), $provR);
      $form->handleRequest($request);
      if ($form->isValid()) {
        $em->persist($provR);
        $em->flush();
        return $view->setStatusCode(codes::HTTP_CREATED);
      } else {
        return $view->setStatusCode(Codes::  HTTP_BAD_REQUEST)->setData($form->serialixeFormErros());
      }
    }




  }

  /*public function postProvinceAction(\Symfony\Component\HttpFoundation\Request $request) {
    //$data = json_decode($request->getContent(), true);
    //$request->request->replace($data);
    //$view = FOSView::Create();
    $data = $request->request->all(); //tenemos todo el datos
    //Creando el formualrio
    $province = new Province();
    $form = $this->createForm(new ProvinceType(), $province);
    //$form = $this->getForm($this->createProvince());
    $form->handleRequest($request);
    return array($form->isValid(), $form->getData());
    $data = json_decode($request->getContent(), true);
    $request->request->replace($data);
    $form->handleRequest($request);
    if ($form->isValid()) {
      return $view->setStatusCode(codes::HTTP_CREATE);
    } else {
      return $view->setStatusCode(Codes::  HTTP_BAD_REQUEST)->setData($form->serialixeFormErros());
    }
  }*/


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