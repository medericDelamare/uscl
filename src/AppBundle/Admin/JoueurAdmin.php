<?php
namespace AppBundle\Admin;

use AppBundle\Entity\CarriereJoueur;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\Kernel;

class JoueurAdmin extends AbstractAdmin
{

    /**
     * @var Kernel $kernel
     */
    private $kernel;

    /**
     * @param Kernel $kernel
     */
    public function setKernel(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Saison Actuelle')
                ->with('Informations Personelles', ['class' => 'col-md-6'])
                    ->add('nom')
                    ->add('prenom')
                    ->add('mail')
                    ->add('mobile')
                    ->add('dateNaissance')
                    ->add('lieuNaissance')
                    ->add('numero')
                    ->add('numeroLicence')
                    /*->add('photo', 'file', [
                        'required' => false
                    ])*/
                ->end()
                ->with('Statistiques', ['class' => 'col-md-6'])
                    ->add('categorie')
                    ->add('poste')
                    ->add('butsA')
                    ->add('butsB')
                    ->add('butsCoupe')
                    ->add('cartonsJaunes')
                    ->add('cartonsRouges')
                    ->add('buts')
                    ->add('passes')
                ->end()
            ->end()
            ->tab('Carrière')
            ->add('carriere', 'sonata_type_collection', [
                'label' => false,
                'btn_add' => false
            ],[
                'edit' => 'inline',
                'inline' => 'table',
            ])
            ->end();

        /*$formMapper->get('photo')->addModelTransformer(new CallbackTransformer(
            function ($path) {
                dump($path);
                if ($path != null){
                    return new File($this->kernel->getRootDir() . '/../web/pictures/profiles/' . $path);
                }
            },
            function (UploadedFile $file = null) {
                if ($file != null){
                    $file->move($this->kernel->getRootDir() . '/../web/pictures/profiles', $file->getClientOriginalName());
                    return $file->getClientOriginalName();
                }
            }

        ));*/
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('prenom')
            ->add('categorie')
            ->add('poste');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('prenom')
            ->add('categorie')
            ->add('poste')
            ->add('buts');
    }
}