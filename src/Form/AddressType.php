<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label'=> 'Quel nom souhaitez-vous donner à votre adresse?',
                'attr'=>[
                    'placeholder' => 'Nommez votre adresse'
                ]
            ])
            ->add('firstname', TextType::class,[
                'label'=> 'Quel est votre prénom?',
                'attr'=>[
                    'placeholder' => 'Renseignez votre prénom'
                ]
            ])
            ->add('lastname', TextType::class,[
                'label'=> 'Quel est votre nom?',
                'attr'=>[
                    'placeholder' => 'Renseignez votre prénom'
                ]
            ])
            ->add('company', TextType::class,[
                'label'=> 'Êtes vous une société?',
                'required'=>false,
                'attr'=>[
                    'placeholder' => 'Renseignez le nom de votre société'
                ]
            ])
            ->add('address', TextType::class,[
                'label'=> 'Quel est votre adresse?',
                'attr'=>[
                    'placeholder' => '8 rue des lilas...'
                ]
            ])
            ->add('postal', TextType::class,[
                'label'=> 'Code postal de votre lieu de résidence?',
                'attr'=>[
                    'placeholder' => 'Renseignez votre code postal'
                ]
            ])
            ->add('city', TextType::class,[
                'label'=> 'Quel est votre ville de résidence?',
                'attr'=>[
                    'placeholder' => 'Renseignez votre ville'
                ]
            ])
            ->add('country', CountryType::class,[
                'label'=> 'Quel est votre pays de résidence?',
                'attr'=>[
                    'placeholder' => 'Renseignez le pays'
                ]
            ])
            ->add('phone', TelType::class,[
                'label'=> 'Quel est votre numéro de téléphone?',
                'attr'=>[
                    'placeholder' => 'Renseignez votre numéro de téléphone'
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn-block btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
