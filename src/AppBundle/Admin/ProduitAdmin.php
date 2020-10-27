<?php


namespace AppBundle\Admin;


use AppBundle\Entity\Boutique\Produit;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProduitAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        /** @var Produit $subject */
        $subject = $this->getSubject();
        $container = $this->getConfigurationPool()->getContainer();
        $fullPath = $container->get('request_stack')->getCurrentRequest()->getBasePath();

        $help = '';
        if ($subject->getImage()) {
            $help =
                '<p>Prévisualisation : <img width="auto" style="max-width:200px" src="' . $fullPath . '/pictures/Logos/' . $subject->getImage() . '" /></p>';
        }

        $formMapper
            ->add('nom')
            ->add('prixCatalogue')
            ->add('reference')
            ->add('file', FileType::class, [
                'label' => 'Image',
                'required' => false,
                'help' => $help
            ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nom')
            ->add('prixCatalogue')
            ->add('reference');
    }

    /**
     * @param Produit $produit
     */
    public function prePersist($produit)
    {
        if ($produit->getFile()) {
            $produit->refreshUpdated();
            $produit->setImage($produit->getFile()->getClientOriginalName());
        }
    }

    /**
     * @param Produit $produit
     */
    public function preUpdate($produit)
    {
        if ($produit->getFile()) {
            $produit->refreshUpdated();
            $produit->setImage($produit->getFile()->getClientOriginalName());
        }
    }

    /**
     * @param Produit $produit
     * @return string
     */
    public function toString($produit)
    {
        return $produit->getId() ? $produit->getNom() : 'Produit';
    }
}