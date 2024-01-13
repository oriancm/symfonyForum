<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class LyceenForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('email', TextType::class)
            ->add('age', IntegerType::class)
            ->add('telephone', TextType::class)
            ->add('lycee', TextType::class)
            ->add('section', ChoiceType::class, [
                'label' => 'Section',
                'choices' => [
                    'Seconde' => 'Seconde',
                    'Première' => 'Première',
                    'Terminal' => 'Terminal',
                ]
            ])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer']);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}