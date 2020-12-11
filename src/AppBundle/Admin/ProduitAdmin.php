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
                '<p>Prévisualisation : <img width="auto" style="max-width:200px" src="' . $fullPath . '/pictures/Boutique/' . $subject->getImage() . '" /></p>';
        }

        $formMapper
            ->add('nom')
            ->add('prixCatalogue')
            ->add('reference')
            ->add('logo',null,[
                'label' => 'Logo obligatoire'
            ])
            ->add('file', FileType::class, [
                'label' => 'Image',
                'required' => false,
                'help' => $help
            ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('prixCatalogue')
            ->add('reference')
            ->add('logo');
    }

    /**
     * @param Produit $produit
     */
    public function prePersist($produit)
    {
        $produit->setPrixClub($this->calculatePrixClub($produit));
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
        $produit->setPrixClub($this->calculatePrixClub($produit));
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

    /**
     * @param Produit $produit
     * @return mixed
     */
    private function calculatePrixClub(Produit $produit)
    {
        return $produit->getPrixCatalogue() - ($produit->getPrixCatalogue() * 0.3);
    }
}