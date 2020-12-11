<?php


namespace AppBundle\Form;


use AppBundle\Model\Boutique\CaracteristiqueCommandeProduit;
use Sonata\Form\Type\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taille', ChoiceType::class, [
                'label' => 'Taille',
                'choices' => [
                    'S' => 'S',
                    'M' => 'M',
                    'L' => 'L',
                    'XL' => 'XL',
                    'XXL' => 'XXL',
                ],
                'data' => 'S',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('quantite', ChoiceType::class, [
                'label' => 'Quantité',
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                ],
                'data' => '1',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('initiales', ChoiceType::class,[
                'label' => 'Voulez-vous ajouter des initiales à votre produit ? (2,5€)',
                'choices' => [
                    'Non' => '0',
                    'Oui' => '1',
                ],
                'data' => '0',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('send', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ],
                'label' => 'Ajouter au panier'
            ]);
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CaracteristiqueCommandeProduit::class
        ));
    }

    public function getName()
    {
        return 'contact_form';
    }
}