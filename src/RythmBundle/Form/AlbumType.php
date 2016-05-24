<?php

// src/RythmBundle/Form/AlbumType.php
namespace RythmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('artiste')
            ->add('date')
            ->add('genre')
            ->add('folder', FileType::class, array('label' => 'Folder (jpg file)'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RythmBundle\Entity\Album',
        ));
    }
}