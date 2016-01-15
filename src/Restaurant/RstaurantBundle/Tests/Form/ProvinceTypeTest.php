<?php
namespace Restaurant\RstaurantBundle\Tests\Form;

use Restaurant\RstaurantBundle\Entity;
use Restaurant\RstaurantBundle\Form\Type;
use Restaurant\UserBundle\Entity\Province;
use Symfony\Component\Form\Test\TypeTestCase;
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/1/2016
 * Time: 11:23
 */
class ProvinceTypeTest extends TypeTestCase {

  public function testSubmitValidData() {

    $formData = array('testProvince');
    //the first is verify if the FormType compile
    $type = new Type\ProvinceType();
    $form = $this->factory->create($type);

    //$object = Province::fromArray($formData);
    $object = new Province();
    $object->setName('TestProvince');
    //This test checks that none of your data transformers used by the form failed
    $form->submit($formData);
    $this->assertTrue($form->isSynchronized(), 'Formulario no sincronice');
    //checks if all the fields are correctly specified
    var_dump($form->getData()); exit;
    $this->assertEquals($object, $form->getData(), 'Los datos no son iguales');

    $view = $form->createView();
    $children = $view->children;

    /*foreach (array_keys($formData) as $key) {
      $this->assertArrayHasKey($key, $children);
    }*/
  }
}