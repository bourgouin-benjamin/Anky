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
                'years' => ["1960","1961", "1962", "1963", "1964", "1965","1966", "1967", "1968", "1969", "1970","1971", "1972", "1973", "1974", "1975","1976", "1977", "1978", "1979", "1980","1981", "1982", "1983", "1984", "1985","1986", "1987", "1988", "1989", "1990","1991", "1992", "1993", "1994", "1995","1996", "1997", "1998", "1999", "2000", "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010"]
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
