<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ChangePasswordType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled'=> true,
                'label' => 'Mon adresse email'
            ])

            ->add('firstname', TextType::class,[
                'disabled'=> true,
                'label' => 'Mon prénom'
                ])

            ->add('lastname', TextType::class,[
                'disabled'=> true,
                'label' => 'Mon nom'
                ])

            ->add('old_password', PasswordType::class,[
                'label' => 'Mon mot de passe actuel',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre mot de passe actuel'
                ]
            ])
            ->add('new_password', RepeatedType::class,[
                'type' => PasswordType::class,
                'mapped' =>false,
                'invalid_message' => 'les mots de passes doivent être identique',
                'label' => 'Votre mot de passe',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 40,
                    ]),
                'required' => true,
                'first_options' => [
                    'label'=> 'Mon nouveau mot de passe', 
                    'attr' => [
                        'placeholder' => 'saisissez votre nouveau mot de passe'
                    ]
                ],
                'second_options' => [
                    'label'=> 'Confirmation du nouveau mot de passe', 
                    'attr' => ['placeholder'=> 'Confirmez votre nouveau mot de passe'
                    ]
                ]

            ])
            ->add('submit', SubmitType::class,[
                'label' => "Modifier",
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
