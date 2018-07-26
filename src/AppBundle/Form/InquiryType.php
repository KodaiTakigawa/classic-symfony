<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InquiryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', 'text')
        ->add('content', 'text')
        ->add('tel', 'text', [
            'required' => false,
        ])
        ->add('type', 'choise', [
            'choices' => [
                '公演について',
                'その他',
            ],
            'expanded' => true,
        ])
        ->add('content', 'textarea')
        ->add('submit', 'submit', [
            'label' => '送信',
        ])->getForm();
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_post';
    }
    


}
