<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $firstPicture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $secondPicture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thirdPicture;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;


    public function __construct()
    {
        $this->picture = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getFirstPicture(): ?string
    {
        return $this->firstPicture;
    }

    public function setFirstPicture(string $firstPicture): self
    {
        $this->firstPicture = $firstPicture;

        return $this;
    }

    public function getSecondPicture(): ?string
    {
        return $this->secondPicture;
    }

    public function setSecondPicture(?string $secondPicture): self
    {
        $this->secondPicture = $secondPicture;

        return $this;
    }

    public function getThirdPicture(): ?string
    {
        return $this->thirdPicture;
    }

    public function setThirdPicture(?string $thirdPicture): self
    {
        $this->thirdPicture = $thirdPicture;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

}
