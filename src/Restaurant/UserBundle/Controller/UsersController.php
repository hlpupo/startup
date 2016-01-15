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

  /**
   * Create a User from the submitted data.<br/>
   *
   * @ApiDoc(
   *   resource = true,
   *   description = "Creates a new user from the submitted data.",
   *   statusCodes = {
   *     200 = "Returned when successful",
   *     400 = "Returned when the form has errors"
   *   }
   * )
   *
   * @param ParamFetcher $paramFetcher Paramfetcher
   *
   * @RequestParam(name="username", nullable=false, strict=true, description="Username.")
   * @RequestParam(name="email", nullable=false, strict=true, description="Email.")
   * @RequestParam(name="name", nullable=false, strict=true, description="Name.")
   * @RequestParam(name="lastname", nullable=false, strict=true, description="Lastname.")
   * @RequestParam(name="password", nullable=false, strict=true, description="Plain Password.")
   *
   * @return View
   */
  public function postUserAction(ParamFetcher $paramFetcher)
  {
    return $paramFetcher->get('username');
    $userManager = $this->container->get('fos_user.user_manager');

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
    }
  }
}