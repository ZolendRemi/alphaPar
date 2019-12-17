<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Invoice;
use App\Entity\Status;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('client', EntityType::class,
                [
                    'class' => Client::class,
                    'choice_label' => function ($client) {
                        return $client->getLastname() . " " . $client->getFirstname();
                    },
                    'attr' => ["class" => "form-control"]
                ])
            ->add('status', EntityType::class,
                [
                    'class' => Status::class,
                    'choice_label' => 'name',
                    'attr' => ["class" => "form-control"]
                ])
            ->add('ref', TextType::class, ['attr' => ["class" => "form-control", "autofocus" => true]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
