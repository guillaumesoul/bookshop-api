<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TacheRepository")
 * @ApiFilter(SearchFilter::class, properties={"name": "partial"})
 */
class Tache
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserTache", mappedBy="tache")
     */
    private $userTaches;

    public function __construct()
    {
        $this->userTaches = new ArrayCollection();
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * @return Collection|UserTache[]
     */
    public function getUserTaches(): Collection
    {
        return $this->userTaches;
    }

    public function addUserTach(UserTache $userTach): self
    {
        if (!$this->userTaches->contains($userTach)) {
            $this->userTaches[] = $userTach;
            $userTach->setTache($this);
        }

        return $this;
    }

    public function removeUserTach(UserTache $userTach): self
    {
        if ($this->userTaches->contains($userTach)) {
            $this->userTaches->removeElement($userTach);
            // set the owning side to null (unless already changed)
            if ($userTach->getTache() === $this) {
                $userTach->setTache(null);
            }
        }

        return $this;
    }
}
