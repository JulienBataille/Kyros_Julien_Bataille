<?php

namespace App\Form;

use App\Entity\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) :void
    {
        $builder
            ->add('name', TextType::class,
                [
                    'attr' =>
                        [
                            'placeholder' => 'Entrez votre nom',
                            'class' => 'form-control',
                            
                        ],
                    'label' => false,
                    'constraints' =>
                        [
                            new NotBlank
                            ([
                                'message' => 'Veuillez entrer votre nom',
                            ]),
                            new Length
                            ([
                                'min' => 2,
                                'minMessage' => 'Votre nom doit contenir au moins {{ limit }} caractères',
                                'max' => 255,
                                'maxMessage' => 'Votre nom ne peut pas contenir plus de {{ limit }} caractères',  
                            ]),
                        ]
                ])
            ->add('email', EmailType::class,
                [
                    'attr' =>
                        [
                            'placeholder' => 'Entrez votre email',
                            'class' => 'form-control',
                            'id' => 'email'
                        ],
                    'label' => false,
                    'constraints' =>
                        [
                            new NotBlank
                            ([
                                'message' => 'Veuillez entrer votre email',
                            ])
                        ]
                ])
            ->add('number', TelType::class, 
                [
                    'attr' =>
                        [
                            'placeholder' => 'Entrez votre numéro de téléphone',
                            'class' => 'form-control',
                            'id' => 'phone'
                        ],
                    'label' => false,
                    'constraints' =>
                        [
                            new NotBlank
                            ([
                                'message' => 'Veuillez entrer votre numéro de téléphone',
                            ]),
                        ]
                ])
            ->add('message', TextareaType::class,
                [
                    'attr' =>
                        [
                            'placeholder' => 'Entrez votre message',
                            'class' => 'form-control',
                            'id' => 'message'
                        ],
                    'label' => false,
                    'constraints' =>
                        [
                            new NotBlank
                            ([
                                'message' => 'Veuillez entrer votre message',
                            ]),
                            new Length
                            ([
                                'min' => 50,
                                'minMessage' => 'Votre message doit contenir au moins {{ limit }} caractères',
                                'max' => 1000,
                                'maxMessage' => 'Votre message ne peut pas contenir plus de {{ limit }} caractères',
                            ])
                        ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) :void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);

    }


}


















