<?php

namespace App\Form;

use App\Entity\Compte;
use App\Entity\Categorie;
use App\Entity\Genre;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail')
            ->add('mdp')
            ->add('confirm_mdp')
            ->add('username')
            ->add('birth', DateType::class, [
                'years' => [
                            "2020",
                            "2021"
                            ]
            ])
            ->add('categorie', EntityType::class,[
                'class' => Categorie::class,
                'choice_label' => 'cat',
                'multiple' => true
            ])
            ->add('genre', EntityType::class,[
                'class' => Genre::class,
                'choice_label' => 'gen',
                'multiple' => true
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
