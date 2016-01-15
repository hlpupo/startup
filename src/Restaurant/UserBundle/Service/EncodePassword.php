<?php
namespace Restaurant\UserBundle\Service;
use Symfony\Component\Security\Core\Encoder\BasePasswordEncoder;
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 27/12/2015
 * Time: 13:08
 */
class EncodePassword extends BasePasswordEncoder{
  public function encodePassword($raw, $salt) {
    // TODO: Implement encodePassword() method.
    return hash('sha512', $raw.$salt);
  }

  public function isPasswordValid($encoded, $raw, $salt) {
    // TODO: Implement isPasswordValid() method.
    return $this->comparePasswords($encoded, $this->encodePassword($raw, $salt));
  }


}