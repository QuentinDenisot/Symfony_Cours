<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotationRepository")
 */
class Notation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="notations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bug", inversedBy="notations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bug;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fonctionnalite", inversedBy="notations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fonctionnalite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBug(): ?Bug
    {
        return $this->bug;
    }

    public function setBug(?Bug $bug): self
    {
        $this->bug = $bug;

        return $this;
    }

    public function getFonctionnalite(): ?Fonctionnalite
    {
        return $this->fonctionnalite;
    }

    public function setFonctionnalite(?Fonctionnalite $fonctionnalite): self
    {
        $this->fonctionnalite = $fonctionnalite;

        return $this;
    }
}
