<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Trick;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

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
            'attr' => array(
                'placeholder' => 'Nom de la catégorie'
            ),
            'label' => false
        ))
        ->add('imageFile', VichFileType::class, [
            'attr' => array(
                'placeholder' => 'Nom de la catégorie'
            )
            ])  
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
