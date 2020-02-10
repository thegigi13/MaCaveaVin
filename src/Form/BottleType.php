<?php

namespace App\Form;

use App\Entity\Bottle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// classe du type de bouteille
class BottleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('degree')
            ->add('vintage')
            ->add('quantity')
            ->add('price')
            ->add('designation')
            ->add('sold')
            ->add('consumption_date')
            ->add('type')
            ->add('picture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bottle::class,
            'translation_domain' => 'forms'
        ]);
    }

    /**
     * @return array
     */
    private function getChoices()
    {
        $choices = Bottle::DESIGNATION;

        $output =[];
        foreach ($choices as $k => $v)
        {
            $output[$v] = $k;
        return $choices;
        }
    }
}
