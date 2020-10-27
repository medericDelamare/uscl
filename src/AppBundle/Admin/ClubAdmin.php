<?php


namespace AppBundle\Admin;


use AppBundle\Entity\Club;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Xmon\ColorPickerTypeBundle\Form\Type\ColorPickerType;

class ClubAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $subject = $this->getSubject();
        $container = $this->getConfigurationPool()->getContainer();
        $fullPath = $container->get('request_stack')->getCurrentRequest()->getBasePath();

        $help = '';
        if ($subject->getLogo()) {
            $help =
                '<p>Prévisualisation : <img width="auto" style="max-width:200px" src="' . $fullPath . '/pictures/Logos/' . $subject->getLogo() . '" /></p>';
        }

        $formMapper
            ->add('nom')
            ->add('couleurPrincipale', ColorPickerType::class, [
                'required' => false
            ])
            ->add('couleurSecondaire', ColorPickerType::class, [
                'required' => false
            ])
            ->add('file', FileType::class, [
                'label' => 'Logo',
                'required' => false,
                'help' => $help
            ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('logo');
    }

    /**
     * @param Club $produit
     */
    public function prePersist($produit)
    {
        if ($produit->getFile()) {
            $produit->refreshUpdated();
            $produit->setLogo($produit->getFile()->getClientOriginalName());
        }
    }

    /**
     * @param Club $produit
     */
    public function preUpdate($produit)
    {
        if ($produit->getFile()) {
            $produit->refreshUpdated();
            $produit->setLogo($produit->getFile()->getClientOriginalName());
        }
    }

}