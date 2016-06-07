<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 1/2/2016
 * Time: 23:50
 */

namespace Restaurant\UserBundle\Form;


use Symfony\Component\Finder\Iterator\FileTypeFilterIterator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

class RegisterType extends AbstractType{
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults(array(
        'data_class' => 'Restaurant\RstaurantBundle\Entity\Restaurants',
        'csrf_protection' => false));
  }
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
        ->add('name','text')
        ->add('email','text')
        ->add('username','text')
        ->add('password','text')
        ->add('province','text')
        ->add('municipality','text')
        ->add('profilePicture',FileType::class)
        ->add('phone','text')
        ->add('postalcode','text')
        ->add('cif','text')
        ->add('save', 'submit');
  }

  public function getName() {
    // TODO: Implement getName() method.
    return 'RegisterType';
  }


}