<?php

namespace App\Entity;

use App\Repository\TrickRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrickRepository::class)
 */
class Trick
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=categories::class, inversedBy="tricks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="text")
     */
    private $createDate;

    /**
     * @ORM\Column(type="text")
     */
    private $dateUpdate;

    /**
     * @ORM\OneToMany(targetEntity=images::class, mappedBy="trick")
     */
    private $images;

    public function __construct()
    {
        $date = new \DateTime('now');
        $result = $date->format(('d-m-Y'));
        $this->setCreateDate($result);
        $this->setDateUpdate($result);
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getCategory(): ?categories
    {
        return $this->category;
    }

    public function setCategory(?categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCreateDate(): ?string
    {
        return $this->createDate;
    }

    public function setCreateDate(string $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getDateUpdate(): ?string
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(string $dateUpdate): self
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * @return Collection|images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setTrick($this);
        }

        return $this;
    }

    public function removeImage(images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getTrick() === $this) {
                $image->setTrick(null);
            }
        }

        return $this;
    }
}
