<?php


namespace AppBundle\Entity\Boutique;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Produit
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Produit
{
    const SERVER_PATH_TO_IMAGE_FOLDER =  '/../../../../web/pictures/Boutique';

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
     * @var float
     * @ORM\Column(type="float", nullable=false)
     */
    private $prixClub;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $logo;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Produit
     */
    public function setNom($nom)
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Produit
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrixCatalogue()
    {
        return $this->prixCatalogue;
    }

    /**
     * @param float $prixCatalogue
     * @return Produit
     */
    public function setPrixCatalogue($prixCatalogue)
    {
        $this->prixCatalogue = $prixCatalogue;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     * @return Produit
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrixClub(): float
    {
        return $this->prixClub;
    }

    /**
     * @param float $prixClub
     * @return Produit
     */
    public function setPrixClub(float $prixClub): Produit
    {
        $this->prixClub = $prixClub;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLogo(): bool
    {
        return $this->logo;
    }

    /**
     * @param bool $logo
     * @return Produit
     */
    public function setLogo(bool $logo): Produit
    {
        $this->logo = $logo;
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