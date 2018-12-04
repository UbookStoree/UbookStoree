<?php

namespace EbookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EbookType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')->add('auteur')->add('resumer')->add('type',ChoiceType::class, array(
            'choices'  => array(
                'adulte'  =>'adulte',
                'Enfant' =>'Enfant',
                'Femme' => 'Femme'      ) ,
            'placeholder'=>'type'))
        ->add('prix')->add('file');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EbookBundle\Entity\Ebook'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ebookbundle_ebook';
    }


}
