<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/1/2016
 * Time: 13:52
 */

namespace Restaurant\UserBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
//use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Restaurant\UserBundle\Form;



class UsersController extends FOSRestController {

  /**
   * Return the overall user list.
   *
   * @ApiDoc(
   *   resource = true,
   *   description = "Return the overall User List",
   *   statusCodes = {
   *     200 = "Returned when successful",
   *     404 = "Returned when the user is not found"
   *   }
   * )
   *
   * @return View
   */
  public function getUsersAction()
  {
    $userManager = $this->container->get('fos_user.user_manager');
    $entity = $userManager->findUsers();

    if (!$entity) {
      throw $this->createNotFoundException('Data not found.');
    }

    $view = View::create();
    $view->setData($entity)->setStatusCode(200);

    return $view;
  }


  public function postUserAction(\Symfony\Component\HttpFoundation\Request $request)
  {
    /*$username = $request->get('username');
    $password = $request->get('password');
    return $username;*/
    //return $request->request->all(); //this funca
    $data = json_decode($request->getContent(), true);
    $request->request->replace($data);
    //echo below should output 'bar'
    return $request->request->get('_username');
    /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
    $formFactory = $this->container->get('fos_user.registration.form.factory');
    /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
    $userManager = $this->container->get('fos_user.user_manager');
    /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
    $dispatcher = $this->container->get('event_dispatcher');

    $user = $userManager->createUser();
    $user->setEnabled(true);

    $event = new GetResponseUserEvent($user, $request);
    $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

    if (null !== $event->getResponse()) {
      return $event->getResponse();
    }

    $form = $formFactory->createForm();
    $form->setData($user);

    $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array


    if ('POST' === $request->getMethod()) {
      $form->bind($jsonData);

      if ($form->isValid()) {
        $event = new FormEvent($form, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

        $userManager->updateUser($user);

        $response = new Response("User created.", 201);

        return $response;
      }
    }

    $view = View::create($form, 400);
    return $this->get('fos_rest.view_handler')->handle($view);
  }

  public function getUserAction(){
    return $this->get('security.context')->getToken()->getUser();
  }





































/*    $userManager = $this->container->get('fos_user.user_manager');

    $user = $userManager->createUser();
    $user->setFirstname($paramFetcher->get('username'));
    $user->setLastname($paramFetcher->get('email'));
    $user->setPlainPassword($paramFetcher->get('password'));
    $user->setUsername($paramFetcher->get('name'));
    $user->setEmail($paramFetcher->get('lastname'));
    $user->setEnabled(true);
    $user->addRole('ROLE_USER');

    $view = View::create();

    $errors = $this->get('validator')->validate($user, array('Registration'));

    if (count($errors) == 0) {
      $userManager->updateUser($user);
      $view->setData($user)->setStatusCode(200);
      return $view;
    } else {
      $view = $this->getErrorsView($errors);
      return $view;
    }*/
}