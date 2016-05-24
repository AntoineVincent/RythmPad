<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
                ->add('prenom')
                ->add('genre', ChoiceType::class, array(
    'choices' => array(
        'homme' => 'homme',
        'femme' => 'femme',
    ),
    'required'    => false,
    'placeholder' => 'Choix',
    'empty_data'  => null
    ))
                ->add('promo', ChoiceType::class, array(
        'choices' => array(
        'chartres' => 'chartres',
        'fontainebleau' => 'fontainebleau',
        'la loupe' => 'la loupe',
    ),
    'required'    => false,
    'placeholder' => 'Choix',
    'empty_data'  => null
    ));
    }
    
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }
}