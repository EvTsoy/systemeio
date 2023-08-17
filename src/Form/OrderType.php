<?php

namespace App\Form;

use App\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', ChoiceType::class, [
                'label' => 'Select Product',
                'choices' => $options['products'],
                'choice_label' => 'title',
                'choice_value' => 'id',
            ])
            ->add('tax', TextType::class, [
                'label' => 'Tax Number *',
            ])

            ->add('coupon', TextType::class, [
                'label' => 'Coupon Code',
            ])
            ->add('paymentProcessor', ChoiceType::class, [
                'label' => 'Select Payment',
                'choices' => $options['paymentProcessors'],
                'choice_label' => 'title',
                'choice_value' => 'id'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
            'products' => [], // Declare the 'products' option
            'paymentProcessors' => [],
        ]);
    }

}

