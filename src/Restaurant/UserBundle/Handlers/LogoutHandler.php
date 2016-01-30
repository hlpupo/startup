<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 30/1/2016
 * Time: 16:06
 */

namespace Restaurant\UserBundle\Handlers;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class LogoutHandler implements LogoutSuccessHandlerInterface{
  public function onLogoutSuccess(Request $request) {
    // TODO: Implement onLogoutSuccess() method.
    $response = new Response(json_encode(array('status' => true)));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }

}