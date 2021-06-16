<?php

namespace App\Entity;

use App\Repository\LockMainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LockMainRepository::class)
 */
class LockMain
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\OneToMany(targetEntity=LockQuestion::class, mappedBy="main_id")
     */
    private $question;

    public function __construct()
    {
        $this->question = new ArrayCollection();
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection|LockQuestion[]
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(LockQuestion $question): self
    {
        if (!$this->question->contains($question)) {
            $this->question[] = $question;
            $question->setMainId($this);
        }

        return $this;
    }

    public function removeQuestion(LockQuestion $question): self
    {
        if ($this->question->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getMainId() === $this) {
                $question->setMainId(null);
            }
        }

        return $this;
    }
}
