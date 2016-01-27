<?php
namespace Restaurant\RstaurantBundle\Twig\Extension;


  /**
   * Created by PhpStorm.
   * User: DELL
   * Date: 2/1/2016
   * Time: 13:44
   */
class UtilExtension extends \Twig_Extension {
  public function getName() {
    // TODO: Implement getName() method.
    return 'StartUP Twig';
  }

  public function getFunctions() {
    return array(
      new \Twig_SimpleFunction('get_user_logged', array($this, 'getLoggedInUser'))
    );
  }

  public function getLoggedInUser() {
    return "Yo logeado";
  }


}