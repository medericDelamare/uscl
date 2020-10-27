<?php


namespace AppBundle\Entity\Boutique;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Produit
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Produit
{
    const SERVER_PATH_TO_IMAGE_FOLDER =  '/../../../web/pictures/Boutique';

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    private $nom;

    /**
     * Unmapped property to handle file uploads
     */
    private $file;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $image;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=false)
     */
    private $prixCatalogue;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $reference;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Produit
     */
    public function setNom(string $nom): Produit
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     * @return Produit
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Produit
     */
    public function setImage(string $image): Produit
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrixCatalogue(): float
    {
        return $this->prixCatalogue;
    }

    /**
     * @param float $prixCatalogue
     * @return Produit
     */
    public function setPrixCatalogue(float $prixCatalogue): Produit
    {
        $this->prixCatalogue = $prixCatalogue;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     * @return Produit
     */
    public function setUpdated(\DateTime $updated): Produit
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return Produit
     */
    public function setReference(string $reference): Produit
    {
        $this->reference = $reference;
        return $this;
    }



    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        $this->getFile()->move(
            __DIR__ . self::SERVER_PATH_TO_IMAGE_FOLDER,
            $this->getFile()->getClientOriginalName()
        );

        $this->image = $this->getFile()->getClientOriginalName();
        $this->setFile(null);
    }

    /**
     * Lifecycle callback to upload the file to the server
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function lifecycleFileUpload()
    {
        $this->upload();
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated()
    {
        $this->setUpdated(new \DateTime());
    }
}