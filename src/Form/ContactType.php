<?php

namespace App\Form;

use App\Entity\Contact;
use SebastianBergmann\Type\TypeName;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                "label" => "Nom", "attr" => [
                    "placeholder" => "Entrer votre nom"
                ]
            ])
            ->add('firstName',TextType::class ,[
                "label" => "Prénom", "attr" => [
                    "placeholder" => "Entrer votre prénom"
                ]
                ])
            
            ->add('email',EmailType::class, [
                "attr" => [
                    "placeholder" => "Entrer votre email"
                ]
                ])
            ->add('numberPhone',NumberType::class, [
                "label" => "Téléphone", "attr" => [
                    "placeholder" => "Entrer votre numéro de téléphone"
                ]
                ])
            ->add('object',TextType::class, [
                "label" => "Objet", "attr" => [
                    "placeholder" => "Indiquez l'objet de votre message"
                ]
                ])
            ->add('message',TextareaType::class,[
                "label" => "Message", "attr" => [
                    "placeholder" => "Entrer votre message"
                ]
                ])
            ->add('Envoyer', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
