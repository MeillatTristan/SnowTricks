<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Trick;
use App\Entity\Videos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, array(
            'attr' => array(
                'placeholder' => 'Nom du tricks'
            ),
            'label' => false
        ))
        ->add('description', TextareaType::class, array(
            'attr' => array(
                'placeholder' => 'Description'
            ),
            'label' => false
        ))
        ->add('category', EntityType::class, array(
            'class' => Categories::class,
            'choice_label' => 'name',
            'label' => false,
            'placeholder' => "Choisir une catégorie"
        ))
        ->add('images', FileType::class, [
            'label' => false,
            'multiple' => true,
            'mapped' => false,
            'required' => false,
            'attr'     => [
                'accept' => 'image/*',
                'multiple' => 'multiple',
            ]
        ])
        ->add('videos', CollectionType::class, [
            'entry_type' => VideosType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
            'mapped' => false,
            'attr' => [
                'placeholder' => "Url d'une vidéo youtube",
            ],
            'entry_options' => ['label' => false]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
