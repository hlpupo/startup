<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2/1/2016
 * Time: 17:30
 */

namespace Restaurant\UserBundle\Entity;
use Doctrine\ORM\EntityRepository;

class MunicipalityRepository extends EntityRepository{
  public function getMunicipalityForProvince($id) {
    /*$repository = $this->getDoctrine()
        ->getRepository('AcmeStoreBundle:Product');*/

    $query = $this->createQueryBuilder('p')
        ->where('p.id > :price')
        ->getQuery();


    $products = $query->getResult();
  }
}