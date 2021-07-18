<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
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
    private $gen;

    /**
     * @ORM\ManyToMany(targetEntity=Series::class, mappedBy="genre")
     */
    private $series;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="genre")
     */
    private $users;

    public function __construct()
    {
        $this->series = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGen(): ?string
    {
        return $this->gen;
    }

    public function setGen(string $gen): self
    {
        $this->gen = $gen;

        return $this;
    }

    /**
     * @return Collection|Series[]
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Series $series): self
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
            $series->addTest($this);
        }

        return $this;
    }

    public function removeSeries(Series $series): self
    {
        if ($this->series->removeElement($series)) {
            $series->removeTest($this);
        }

        return $this;
    }

    public function __toString(){
        return $this->gen;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addGenre($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeGenre($this);
        }

        return $this;
    }
}
