<?php

namespace App\Form;

use App\Entity\Trip;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CreateTripFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departureCity', TextType::class)
            ->add('destinationCity', TextType::class)
            ->add('departureDate', DateType::class, [
                'label' => 'invoice_date',
                'widget' => 'single_text',
            ])
            ->add('baggage', CheckboxType::class, [
                'help' => 'You must agree our terms',
                'required' => false
            ])
            ->add('contribution', TextType::class)
            ->add('travelTime', TextType::class)
            ->add('animal', CheckboxType::class, [
                'help' => 'You must agree our terms',
                'required' => false
            ])
            ->add('stop', CheckboxType::class, [
                'help' => 'You must agree our terms',
                'required' => false
            ])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }
}
