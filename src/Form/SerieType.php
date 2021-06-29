<?php

namespace App\Form;

use App\Entity\Series;
use App\Entity\Categorie;
use App\Entity\Genre;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('keywords')
            ->add('resume')
            ->add('categorie', EntityType::class,[
                'class' => Categorie::class,
                'choice_label' => 'cat'
            ])
            ->add('genre', EntityType::class,[
                'class' => Genre::class,
                'choice_label' => 'gen'
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Series::class,
        ]);
    }
}
