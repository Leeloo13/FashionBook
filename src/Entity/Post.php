<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[Vich\Uploadable]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(
        message: 'Le titre de l\'article ne doit pas être vide'
    )]
    private string $title;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(
        message: 'Le contenu de l\'article ne doit pas être vide'
    )]
    private string $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string|null $image;


    #[Vich\UploadableField(mapping: "post_images", fileNameProperty: "image")]
    #[Assert\Image(
        corruptedMessage: 'Le fichier image est corrompu',
        mimeTypesMessage: 'Ce fichier n\'est pas une image valide',
        sizeNotDetectedMessage: 'La taille de l\'image n\'a pas pu être détectée'
    )]
    private File|null $imageFile;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\Url(
        message: 'L\'url {{value}} n\'est pas une url valide'
    )]
    private string|null $urlVideo;

    #[ORM\Column(type: 'boolean')]
    private bool $visible;

    #[ORM\Column(type: 'datetime')]
    private \Datetime $createdAt;

    #[ORM\Column(type: 'datetime')]
    private \Datetime $updatedAt;

    #[ORM\Column(type: 'boolean')]
    private bool $verified;

    public function __construct()
    {
        $this->setVisible(true);
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
        $this->setVerified(true);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile)
        {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

    public function getUrlVideo(): ?string
    {
        return $this->urlVideo;
    }

    public function setUrlVideo(?string $urlVideo): self
    {
        $this->urlVideo = $urlVideo;

        return $this;
    }

    public function getVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getVerified(): ?bool
    {
        return $this->verified;
    }

    public function setVerified(bool $verified): self
    {
        $this->verified = $verified;

        return $this;
    }
}
