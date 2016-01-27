<?php
namespace Restaurant\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Restaurant\UserBundle\Entity\Municipality;

class LoadMunicipality extends AbstractFixture implements OrderedFixtureInterface  {
  public function getOrder() {
    // TODO: Implement getOrder() method.
    return 2;
  }


  public function load(ObjectManager $manager) {
    // TODO: Implement load() method.
    $array = [['Artigas'],
      ['Canelones'],
      ['Cerro Largo'],
      ['Colonia'],
      ['Durazno', 'Sarandi del Yi', 'Carmen', 'La Paloma', 'Centenario', 'Santa Bernardina', 'Blanquillo'],
      ['Flores'],
      ['Florida'],
      ['Lavalleja'],
      ['Aigua', 'Garzon', 'Maldonado', 'Pan de Azucar', 'Piriapolis', 'Punta del Este', 'San Carlos', 'Solis Grande'],
      ['Cerro', 'Centro', 'Ciudad Vieja', 'Cordon', 'Pocito', 'Tres Cruces', 'Aguada', 'Parque Rodo', 'Parque Batlle', 'Buceo',
        'Carrasco', 'Malvin'],
      ['Paysandú'],
      ['Río Negro'],
      ['Rivera'],
      ['Rocha'],
      ['Salto'],
      ['San Jose'],
      ['Soriano'],
      ['Tacuarembo'],
      ['Treinta y Tres']
    ];
    foreach($array as $key => $val) {
      foreach($val as $v) {
        $munp = new Municipality();
        $munp->setName($v);
        $munp->setProvince($this->getReference('prov'.$key));
        $manager->persist($munp);
      }
    }
    $manager->flush();
  }

}