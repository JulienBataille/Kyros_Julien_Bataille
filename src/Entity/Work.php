<?php

namespace App\Entity;

use App\Repository\WorkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkRepository::class)]
class Work
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $works = null;

    /**
     * @var Collection<int, author>
     */
    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'works')]
    private Collection $author;

    public function __construct()
    {
        $this->author = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getWorks(): ?string
    {
        return $this->works;
    }

    public function setWorks(?string $works): static
    {
        $this->works = $works;

        return $this;
    }

    /**
     * @return Collection<int, author>
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    public function addAuthor(author $author): static
    {
        if (!$this->author->contains($author)) {
            $this->author->add($author);
        }

        return $this;
    }

    public function removeAuthor(author $author): static
    {
        $this->author->removeElement($author);

        return $this;
    }
}
