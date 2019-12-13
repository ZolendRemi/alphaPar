<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, ["attr"=>["class"=>"form-control"]])
            ->add('lastname',TextType::class, ["attr"=>["class"=>"form-control","autofocus"=>true]])
            ->add('address',TextType::class, ["attr"=>["class"=>"form-control"]])
            ->add('city',TextType::class, ["attr"=>["class"=>"form-control"]])
            ->add('email',TextType::class, ["attr"=>["class"=>"form-control"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
