<?php

namespace App\Entity;

use App\Repository\LockQuestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LockQuestionRepository::class)
 */
class LockQuestion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $question;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity=LockMain::class, inversedBy="question")
     * @ORM\JoinColumn(nullable=false)
     */
    private $main_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getMainId(): ?LockMain
    {
        return $this->main_id;
    }

    public function setMainId(?LockMain $main_id): self
    {
        $this->main_id = $main_id;

        return $this;
    }
}
