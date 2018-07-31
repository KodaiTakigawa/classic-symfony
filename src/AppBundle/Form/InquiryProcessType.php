<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InquiryProcessType extends AbstractType
{
   /**
    * @param FormBuilderInterface $builder
    * @param array $options
    */
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
       ->add('processStatus', 'choice', [
            'choices' => [
                1 => '未対応',
                2 => '対応中',
                3 => '対応済',
            ],
            'empty_data' => 0,
            'expanded' => true,
        ])
       ->add('processMemo', 'text')
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


// 変更したいのだけ
// ->add()
// で加える