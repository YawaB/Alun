<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Task;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'label' => false,
                'attr' => [
                    'class' => 'input',
                    'placeholder' => 'Task name'
                ],
            ])
            ->add('assignedUser', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'attr' => [
                    'class' => 'input',
                    'placeholder' => 'Password'
                ],
            ])
            ->add('project', EntityType::class, [
                'class' => Project::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'input',
                    'placeholder' => 'Project'
                ],
            ])
            ->add('status', CheckboxType::class,[
                'required' => false,
                'label' => 'Status',
                'row_attr' => [
                    'class' => 'checkbox'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
