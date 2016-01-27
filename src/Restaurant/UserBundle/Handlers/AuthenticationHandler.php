<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 17/1/2016
 * Time: 9:58
 */

namespace Restaurant\UserBundle\Handlers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Core\SecurityContext;


class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface {
  private $router;
  private $session;

  public function __construct(RouterInterface $router, Session $session) {
    $this->router = $router;
    $this->session = $session;
  }


  public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
    // TODO: Implement onAuthenticationFailure() method.
    // if AJAX login
    //if ( $request->isXmlHttpRequest() ) {
    $array = array(
      'success' => false,
      'message' => $exception->getMessage()
    ); // data to return via JSON
    $response = new Response(json_encode($array));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
    // if form login
    //} else {
    // set authentication exception to session
    //$request->getSession()->set(SecurityContextInterface::AUTHENTICATION_ERROR, $exception);
    //return new RedirectResponse( $this->router->generate( 'login_route' ) );
    //}
  }

  public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
    // TODO: Implement onAuthenticationSuccess() method.

    if($token->getUser()->hasRole('ROLE_ADMIN')) {
      //$url = $this->router->generate('admin_dashboard');
      $array = array('success' => true, 'ROLE' => 'ADMIN' ); // data to return via JSON
    } else if ($token->getUser()->hasRole('ROLE_RESTAURANT')) {
      $array = array('success' => true, 'ROLE' => 'RESTAURANT' ); // data to return via JSON
    } else {
      $array = array('success' => true, 'ROLE' => 'USER' ); // data to return via JSON
    }
    $response = new Response(json_encode($array));
    $response->headers->set('Content-Type', 'application/json');
    return $response;

    /*if ($request->isXmlHttpRequest()) {
      $array = array('success' => true ); // data to return via JSON
      $response = new Response(json_encode($array));
      $response->headers->set('Content-Type', 'application/json');
      return $response;
      // if form login
    } else {
      if ($this->session->get('_security.main.target_path')) {
        $url = $this->session->get('_security.main.target_path');
      } else if($token->getRoles()){
      } // end if
      return new RedirectResponse($url);
    }*/
  }

}