<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'    => 'Введите имя',
            ])
            ->add('fname', TextType::class, [
                'label'    => 'Введите фамилию',
            ])
            ->add('email', EmailType::class, [
                'label'    => 'Введите почту',
            ])
            ->add('phone', TextType::class, [
                'label'    => 'Введите номер телефона',
            ])
            ->add('educations',CollectionType::class, [
                'entry_type' => EducationType::class,
                'entry_options' => [
                    'label' => false
                ],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ])
            ->add('userDataProcessing', CheckboxType::class,[
                'label'    => 'Я даю свое согласние на обработку моих личных данных',
                'required' => false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Зарегестрироваться',
                'attr' =>[
                    'class' => 'btn btn-success'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
