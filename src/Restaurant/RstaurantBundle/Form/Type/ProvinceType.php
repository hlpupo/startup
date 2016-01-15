<?php
namespace Restaurant\RstaurantBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 4/1/2016
 * Time: 23:16
 */
class ProvinceType extends AbstractType{

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults(array('data_class' => 'Restaurant\UserBundle\Entity\Province'));
  }

  public function buildForm(FormBuilderInterface $builder, array $option) {
    $builder->add('name','text');
  }

  public function getName() {
    return 'province';
  }
}