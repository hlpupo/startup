<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20/1/2016
 * Time: 0:18
 */

namespace Restaurant\RstaurantBundle\Controller;


use Restaurant\UserBundle\Entity\Province;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Restaurant\RstaurantBundle\Form\Type\ProvinceType;

class ExampleController extends Controller {
  public function newAction(Request $request)
  {
    // crea una task y le asigna algunos datos ficticios para este ejemplo
    $task = new Province();


    /*$form = $this->createFormBuilder($task)
      ->add('name', 'text')
      ->add('save', 'submit')
      ->getForm();*/
    $form = $this->createForm(new ProvinceType(), $task);
    $data = $request->request->all(); //tenemos todo el datos

    $form->handleRequest($request);

    if ($form->isValid()) {
      // guardar la tarea en la base de datos
      echo "<pre>";
      var_dump($form->isValid());
      var_dump( $form->getData());
      print_r($data);
      echo "</pre>";
      exit;

      return $this->redirect($this->generateUrl('rstaurant_homepage'));
    }
    return $this->render('RstaurantBundle:Default:index.html.twig', array(
      'form' => $form->createView(),
    ));
  }
}