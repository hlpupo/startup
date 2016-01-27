<?php
namespace Restaurant\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType {
  public function getName() {
    // TODO: Implement getName() method.
    return "restaurant_user_registration";
  }
  public function getParent()
  {
    return 'fos_user_registration';
  }
  /**
   * @param FormBuilderInterface $builder
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('email', 'email')
    ;
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults(array(
      'data_class' => 'Restaurant\UserBundle\Entity\Users',
      'csrf_protection'   => false
    ));
  }

}