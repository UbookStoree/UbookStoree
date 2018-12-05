<?php

namespace booksBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
                ->add('etatLivre')
                ->add('image',FileType::class, array('label' => 'Image (Image File)'))
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
