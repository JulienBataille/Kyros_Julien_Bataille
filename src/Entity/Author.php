<?php

namespace App\Entity;

use App\Entity\Capacity;
use App\Entity\Localisation;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(nullable: true)]
    private ?array $job = null;

    /**
     * @var Collection<int, localisation>
     */
    #[ORM\ManyToMany(targetEntity: Localisation::class, inversedBy: 'authors', cascade: ['persist', 'remove'])]
    private Collection $Localisation;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $citation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, capacity>
     */
    #[ORM\ManyToMany(targetEntity: Capacity::class, inversedBy: 'authors', cascade: ['persist', 'remove'])]
    private Collection $capacity;

    /**
     * @var Collection<int, ToDo>
     */
    #[ORM\OneToMany(targetEntity: ToDo::class, mappedBy: 'author', cascade: ['persist', 'remove'])]
    private Collection $toDos;

    /**
     * @var Collection<int, Emploi>
     */
    #[ORM\OneToMany(targetEntity: Emploi::class, mappedBy: 'author', cascade: ['persist', 'remove'])]
    private Collection $emplois;

    /**
     * @var Collection<int, Diplome>
     */
    #[ORM\OneToMany(targetEntity: Diplome::class, mappedBy: 'Author', cascade: ['persist', 'remove'])]
    private Collection $diplomes;

    /**
     * @var Collection<int, Work>
     */
    #[ORM\ManyToMany(targetEntity: Work::class, inversedBy: 'author', cascade: ['persist', 'remove'])]
    private Collection $works;





    public function __construct()
    {
        $this->Localisation = new ArrayCollection();
        $this->capacity = new ArrayCollection();
        $this->toDos = new ArrayCollection();
        $this->emplois = new ArrayCollection();
        $this->diplomes = new ArrayCollection();
        $this->works = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getJob(): ?array
    {
        return $this->job;
    }

    public function setJob(?array $job): static
    {
        $this->job = $job;

        return $this;
    }

    /**
     * @return Collection<int, localisation>
     */
    public function getLocalisation(): Collection
    {
        return $this->Localisation;
    }

    public function addLocalisation(localisation $localisation): static
    {
        if (!$this->Localisation->contains($localisation)) {
            $this->Localisation->add($localisation);
        }

        return $this;
    }

    public function removeLocalisation(localisation $localisation): static
    {
        $this->Localisation->removeElement($localisation);

        return $this;
    }

    public function getCitation(): ?string
    {
        return $this->citation;
    }

    public function setCitation(?string $citation): static
    {
        $this->citation = $citation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, capacity>
     */
    public function getCapacity(): Collection
    {
        return $this->capacity;
    }

    public function addCapacity(capacity $capacity): static
    {
        if (!$this->capacity->contains($capacity)) {
            $this->capacity->add($capacity);
        }

        return $this;
    }

    public function removeCapacity(capacity $capacity): static
    {
        $this->capacity->removeElement($capacity);

        return $this;
    }

    /**
     * @return Collection<int, ToDo>
     */
    public function getToDos(): Collection
    {
        return $this->toDos;
    }

    public function addToDo(ToDo $toDo): static
    {
        if (!$this->toDos->contains($toDo)) {
            $this->toDos->add($toDo);
            $toDo->setAuthor($this);
        }

        return $this;
    }

    public function removeToDo(ToDo $toDo): static
    {
        if ($this->toDos->removeElement($toDo)) {
            // set the owning side to null (unless already changed)
            if ($toDo->getAuthor() === $this) {
                $toDo->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Emploi>
     */
    public function getEmplois(): Collection
    {
        return $this->emplois;
    }

    public function addEmploi(Emploi $emploi): static
    {
        if (!$this->emplois->contains($emploi)) {
            $this->emplois->add($emploi);
            $emploi->setAuthor($this);
        }

        return $this;
    }

    public function removeEmploi(Emploi $emploi): static
    {
        if ($this->emplois->removeElement($emploi)) {
            // set the owning side to null (unless already changed)
            if ($emploi->getAuthor() === $this) {
                $emploi->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Diplome>
     */
    public function getDiplomes(): Collection
    {
        return $this->diplomes;
    }

    public function addDiplome(Diplome $diplome): static
    {
        if (!$this->diplomes->contains($diplome)) {
            $this->diplomes->add($diplome);
            $diplome->setAuthor($this);
        }

        return $this;
    }

    public function removeDiplome(Diplome $diplome): static
    {
        if ($this->diplomes->removeElement($diplome)) {
            // set the owning side to null (unless already changed)
            if ($diplome->getAuthor() === $this) {
                $diplome->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Work>
     */
    public function getWorks(): Collection
    {
        return $this->works;
    }

    public function addWork(Work $work): static
    {
        if (!$this->works->contains($work)) {
            $this->works->add($work);
            $work->addAuthor($this);
        }

        return $this;
    }

    public function removeWork(Work $work): static
    {
        if ($this->works->removeElement($work)) {
            $work->removeAuthor($this);
        }

        return $this;
    }











    
}
