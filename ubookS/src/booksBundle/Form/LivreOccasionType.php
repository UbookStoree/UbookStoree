<?php

namespace booksBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreOccasionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')
                ->add('auteur')
                ->add('prixOccasion')
                ->add('etatLivre',ChoiceType::class,array(
                    'choices'=>array('choices'=>array(
                        'comme neuf'=>'comme neuf',
                        'bon etat'=>'bon etat',
                        'acceptable'=>'acceptable',
                    ),
                )))
                ->add('file')
                ->add('categorie',EntityType::class,
                    array(
                        'class'=> 'booksBundle\Entity\Categorie',
                        'choice_label'=>'nomCategorie',
                        'multiple'=>false));


    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'booksBundle\Entity\LivreOccasion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'booksbundle_livreoccasion';
    }


}
