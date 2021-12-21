<?php

namespace App\Form;

use App\Entity\Director;
use App\Entity\Movie;
use App\Repository\DirectorRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('synopsis')
            ->add('year')
            ->add('directors', EntityType::class, [
                'class' => Director::class,
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (DirectorRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->orderBy('d.firstname', 'ASC');
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
