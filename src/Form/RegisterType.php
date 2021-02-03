<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class,[
                'label' => 'Votre Prénom',
                'constraints' => new Length([
                'min' => 2,
                'max' => 20,
                ]),
                'attr' => [
                    'placeholder' => 'prénom'
                ]
            ])
            ->add('lastname', TextType::class,[
                'label' => 'Votre nom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 20,
                    ]),
                'attr' => [
                    'placeholder' => 'nom'
                ]
            ])
            ->add('email', EmailType::class,[
                'label' => 'votremail@mail.com',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 40,
                    ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre mail'
                ]
            ])
            ->add('password', RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => 'les mots de passes doivent être identique',
                'label' => 'Votre mot de passe',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 40,
                    ]),
                'required' => true,
                'first_options' => [
                    'label'=> 'Mot de passe', 
                    'attr' => [
                        'placeholder' => 'saisissez votre mot de passe'
                    ]
                ],
                'second_options' => [
                    'label'=> 'Confirmation de mot de passe', 
                    'attr' => ['placeholder'=> 'Confirmez votre mot de passe'
                    ]
                ]

            ])
            ->add('submit', SubmitType::class,[
                'label' => "S'inscrire",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
