<?php
namespace Restaurant\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Restaurant\UserBundle\Entity\Groupsusers;

class LoadGroupsUsers extends AbstractFixture implements OrderedFixtureInterface  {
  public function getOrder() {
    // TODO: Implement getOrder() method.
    return 3;
  }


  public function load(ObjectManager $manager) {
 /*   // TODO: Implement load() method.
    $role = new Groupsusers();
    $role->setName('Admin');
    $role->setGroupname('Admin');
    $manager->persist($role);
    $manager->flush();*/
  }

}