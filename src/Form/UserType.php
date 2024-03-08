<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Group;
use App\Entity\Piece;
use App\Entity\Sortie;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('lastname')
            ->add('FirstName')
            ->add('PhoneNumber')
            ->add('Blocked')
            ->add('pseudo')
            ->add('createdDate')
            ->add('updatedDate')
            ->add('picture')
            ->add('sorties', EntityType::class, [
                'class' => Sortie::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('campus', EntityType::class, [
                'class' => Campus::class,
'choice_label' => 'id',
            ])
            ->add('piece', EntityType::class, [
                'class' => Piece::class,
'choice_label' => 'id',
            ])
            ->add('groupes', EntityType::class, [
                'class' => Group::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
