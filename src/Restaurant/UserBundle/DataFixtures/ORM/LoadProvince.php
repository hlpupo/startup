<?php
namespace Restaurant\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Restaurant\UserBundle\Entity\Province;

class LoadProvince extends AbstractFixture implements OrderedFixtureInterface  {
  public function getOrder() {
    // TODO: Implement getOrder() method.
    return 1;
  }


  public function load(ObjectManager $manager) {
    // TODO: Implement load() method.
    $array = ['Artigas', 'Canelones', 'Cerro Largo', 'Colonia', 'Durazno', 'Flores', 'Florida',
      'Lavalleja', 'Maldonado', 'Montevideo', 'Paysandu', 'Rio Negro', 'Rivera', 'Rocha', 'Salto',
      'San Jose', 'Soriano', 'Tacuarembo', 'Treinta y Tres'];
    foreach($array as $key => $val) {
      $prov = new Province();
      $prov->setName($val);
      $prov->getProvinceid($key);
      $manager->persist($prov);
      $this->addReference('prov'.$key, $prov);

    }
    $manager->flush();
  }

}