<?php

namespace App\Form;

use App\Entity\LockMain;
use App\Entity\LockQuestion;
use App\Entity\Categorie;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LockQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question')
            ->add('link')
            ->add('main_id', EntityType::class, [
                'class' => LockMain::class,
                'choice_label' => 'title',
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LockQuestion::class,
        ]);
    }
}
