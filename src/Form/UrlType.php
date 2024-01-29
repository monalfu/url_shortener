<?php

namespace App\Form;

use App\Entity\Url;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UrlType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('urlReal', TextType::class, [
                'label' => 'Introduce tu URL para obtener una versión de URL corta:  ',
                'attr' => [
                    'col' => 20,
                    'rows' => 5,
                    'class' => "form-control form-control-lg",
                    'placeholder' => 'Escribe aquí la Url...',
                ]
            ])
            // ->add('urclCortaPersonalizada', CheckboxType::class, [
            //     'label' => 'Url personalizada',
            //     'required' => false
            // ])
            ->add('urlCorta', TextType::class, [
                'label' => 'Escribe aquí si prefieres personalizarla:  ',
                'attr' => [
                    'col' => 10,
                    'rows' => 5,
                    'class' => "form-control form-control-lg",
                    'placeholder' => 'Escribe aquí la Url corta...',
                ],
                'disabled' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'      => Url::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'task_item',
        ]);
    
        $resolver->setDefaults([
            'data_class' => Url::class,
        ]);
    }
}
