<?php
namespace Restaurant\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Restaurant\UserBundle\Entity\Groupsusers;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Restaurant\UserBundle\Entity\Users;
use Restaurant\RstaurantBundle\Entity\Restaurants;
use Restaurant\RstaurantBundle\Entity\Restaurantconfig;

class LoadUsers extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface  {
  /**
   * @var ContainerInterface
   */
  private $container;

  public function getOrder() {
    // TODO: Implement getOrder() method.
    return 4;
  }

  public function setContainer(ContainerInterface $container = null) {
    // TODO: Implement setContainer() method.
    $this->container = $container;
  }


  public function load(ObjectManager $manager) {
    // TODO: Implement load() method.
    //Restaurant Config
    $restconfig = new Restaurantconfig();
    $restconfig->setCantorders(5);
    $restconfig->setCantpictures(5);
    $manager->persist($restconfig);
    $this->addReference('conf0', $restconfig);
    $restconfig = new Restaurantconfig();
    $restconfig->setCantorders(10);
    $restconfig->setCantpictures(10);
    $manager->persist($restconfig);
    $this->addReference('conf1', $restconfig);
    $restconfig = new Restaurantconfig();
    $restconfig->setCantorders(15);
    $restconfig->setCantpictures(15);
    $manager->persist($restconfig);
    $this->addReference('conf2', $restconfig);

    $groupR = new Groupsusers();
    $this->addReference('GroupR', $groupR);
    $groupA = new Groupsusers();
    $this->addReference('GroupA', $groupA);

    $groupU = new Groupsusers();
    $this->addReference('GroupU', $groupU);


    $userManager = $this->container->get('fos_user.user_manager');
    //make some users
    $admin = $userManager->createUser();
    $this->addReference('UserA', $admin);
    $admin->setFirstname('Hector');
    $admin->setLastname('Reyes');
    //$admin->setProvinceid($this->getReference('prov9'));
    //$admin->setMunicipalityid(24);
    $admin->setUsername('hlpupo');
    $admin->setEmail('hlpupo@gmail.com');
    $admin->setPlainPassword('hlpupo');
    $admin->setEnabled(1);
    $admin->setRoles(array('ROLE_ADMIN'));
    $admin->addGroupUser($this->getReference('GroupA'));

    //user group
    $groupA->setGroupname('ADMIN');
    $groupA->setName('ADMIN');
    $groupA->setRoles(array('ROLE_ADMIN'));
    $groupA->addUserId($this->getReference('UserA'));
    //$userManager->updateUser($admin);

    //User
    $user = $userManager->createUser();
    $this->addReference('UserU', $user);
    $user->setFirstname('User Test');
    $user->setLastname('User');
    //$user->setProvinceid($this->getReference('prov9'));
    //$admin->setMunicipalityid(24);
    $user->setUsername('testuser');
    $user->setEmail('testuser@gmail.com');
    $user->setPlainPassword('testuser');
    $user->setEnabled(1);
    $user->setRoles(array('ROLE_USER'));
    $user->addGroupUser($this->getReference('GroupU'));


    $groupU->setGroupname('USER');
    $groupU->setName('USER');
    $groupU->setRoles(array('ROLE_USER'));
    $groupU->addUserId($this->getReference('UserU'));

    //$userManager->updateUser($user);
    //Restaurant

    $restT = new Restaurants();
    $this->addReference('UserT', $restT);
    $restT->setFirstname('Restaurant Test');
    $restT->setLastname('Restaurant');
    //$restT->setProvinceid($this->getReference('prov9'));
    //$admin->setMunicipalityid(24);
    $restT->setUsername('testrestaurant');
    $restT->setEmail('testrestaurant@gmail.com');
    $restT->setPlainPassword('testrestaurant');
    $restT->setEnabled(1);
    $restT->setRoles(array('ROLE_RESTAURANT'));
    $restT->setProfilePicture('');
    $restT->setAddress('');
    $restT->setCif('');
    $restT->setPhone('58152374');
    $restT->setPostalcode('83300');
    $restT->setConfig($this->getReference('conf0'));
    $restT->addGroupUser($this->getReference('GroupR'));
    //$restT->set
    $groupR->setGroupname('RESTAURANT');
    $groupR->setName('RESTAURANT');
    $groupR->setRoles(array('ROLE_RESTAURANT'));
    $groupR->addUserId($this->getReference('UserT'));

    $manager->persist($admin);
    $manager->persist($user);
    $manager->persist($restT);
    $manager->persist($groupA);
    $manager->persist($groupU);
    $manager->persist($groupR);
    $manager->flush();
  }
}