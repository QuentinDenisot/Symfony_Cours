<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe")
     */
    private $id_equipe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bug", mappedBy="user", orphanRemoval=true)
     */
    private $bugs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fonctionnalite", mappedBy="user", orphanRemoval=true)
     */
    private $fonctionnalites;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notation", mappedBy="user", orphanRemoval=true)
     */
    private $notations;

    public function __construct()
    {
        $this->bugs = new ArrayCollection();
        $this->fonctionnalites = new ArrayCollection();
        $this->notations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getIdEquipe(): ?Equipe
    {
        return $this->id_equipe;
    }

    public function setIdEquipe(?Equipe $id_equipe): self
    {
        $this->id_equipe = $id_equipe;

        return $this;
    }

    /**
     * @return Collection|Bug[]
     */
    public function getBugs(): Collection
    {
        return $this->bugs;
    }

    public function addBug(Bug $bug): self
    {
        if (!$this->bugs->contains($bug)) {
            $this->bugs[] = $bug;
            $bug->setUser($this);
        }

        return $this;
    }

    public function removeBug(Bug $bug): self
    {
        if ($this->bugs->contains($bug)) {
            $this->bugs->removeElement($bug);
            // set the owning side to null (unless already changed)
            if ($bug->getUser() === $this) {
                $bug->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Fonctionnalite[]
     */
    public function getFonctionnalites(): Collection
    {
        return $this->fonctionnalites;
    }

    public function addFonctionnalite(Fonctionnalite $fonctionnalite): self
    {
        if (!$this->fonctionnalites->contains($fonctionnalite)) {
            $this->fonctionnalites[] = $fonctionnalite;
            $fonctionnalite->setUser($this);
        }

        return $this;
    }

    public function removeFonctionnalite(Fonctionnalite $fonctionnalite): self
    {
        if ($this->fonctionnalites->contains($fonctionnalite)) {
            $this->fonctionnalites->removeElement($fonctionnalite);
            // set the owning side to null (unless already changed)
            if ($fonctionnalite->getUser() === $this) {
                $fonctionnalite->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notation[]
     */
    public function getNotations(): Collection
    {
        return $this->notations;
    }

    public function addNotation(Notation $notation): self
    {
        if (!$this->notations->contains($notation)) {
            $this->notations[] = $notation;
            $notation->setUser($this);
        }

        return $this;
    }

    public function removeNotation(Notation $notation): self
    {
        if ($this->notations->contains($notation)) {
            $this->notations->removeElement($notation);
            // set the owning side to null (unless already changed)
            if ($notation->getUser() === $this) {
                $notation->setUser(null);
            }
        }

        return $this;
    }
}
