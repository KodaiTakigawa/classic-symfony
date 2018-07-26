<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InquiryType extends AbstractType
{
   /**
    * @param FormBuilderInterface $builder
    * @param array $options
    */
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
       ->add('name', 'text')
       ->add('email', 'text')
       ->add('tel', 'text', [
           'required' => false,
       ])
       ->add('type', 'choice', [
           'choices' => [
               '公演について',
               'その他',
           ],
           'expanded' => true,
       ])
       ->add('content', 'textarea')
       ->add('submit', 'submit', [
           'label' => '送信',
       ]);
   }

   /**
    * @param OptionsResolverInterface $resolver
    */
   public function setDefaultOptions(OptionsResolverInterface $resolver)
   {
       $resolver->setDefaults(array(
           'data_class' => 'AppBundle\Entity\Inquiry'
       ));
   }

   /**
    * @return string
    */
   public function getName()
   {
       return 'appbundle_inquiry';
   }

}