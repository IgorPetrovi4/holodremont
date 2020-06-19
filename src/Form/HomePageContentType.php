<?php

namespace App\Form;

use App\Entity\HomePageContent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class HomePageContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('imgCarusel', FileType::class,[
                'label' => 'Изображение карусель (jpg file)',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Пожайлуста выберите файл в формате  JPG или PNG',
                    ])
                ],

            ])

            ->add('headingCarusel', TextareaType::class, [
                'label' => 'Заголовок Карусель',
            ])
            ->add('textCarusel', TextareaType::class, [
                'label' => 'Текст Карусель',
            ])
            ->add('imgCircle', FileType::class,[
                'label' => 'Изображение круг (jpg file)',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Пожайлуста выберите файл в формате  JPG или PNG',
                    ])
                ],

            ])
            ->add('headingCircle', TextareaType::class, [
                'label' => 'Заголовок Круг',
            ])
            ->add('textCircle', TextareaType::class, [
                'label' => 'Текст Круг',
            ])
            ->add('imgMarketing', FileType::class,[
                'label' => 'Изображение маркетинг (jpg file)',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Пожайлуста выберите файл в формате  JPG или PNG',
                    ])
                ],

            ])
            ->add('headingMarketing', TextareaType::class, [
                'label' => 'Заголовок Маркетинг',
            ])
            ->add('textMarketing', TextareaType::class, [
                'label' => 'Текст Маркетинг',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HomePageContent::class,
        ]);
    }
}
