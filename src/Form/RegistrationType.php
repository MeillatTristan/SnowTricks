<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class,array(
                'attr' => array(
                    'placeholder' => 'Email'
                ),
                'label' => false
            ))
            ->add('pseudo', TextType::class,array(
                'attr' => array(
                    'placeholder' => 'Pseudo'
                ),
                'label' => false
            ))
            ->add('password', PasswordType::class,array(
                'attr' => array(
                    'placeholder' => 'Mot de passe'
                ),
                'label' => false
            ))
            ->add('confirm_password', PasswordType::class,array(
                'attr' => array(
                    'placeholder' => 'Confirmer le mot de passe'
                ),
                'label' => false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
