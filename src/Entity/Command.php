<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandRepository")
 */
class Command
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $tablemeal_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $flatware;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="float")
     */
    private $total_command;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commands")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tablemeal", inversedBy="commands")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tablemeal;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Food", inversedBy="commands")
     */
    private $foods;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Accounts", inversedBy="commands")
     */
    private $accounts;

    public function __construct()
    {
        $this->foods = new ArrayCollection();
        $this->accounts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTablemealNumber(): ?int
    {
        return $this->tablemeal_number;
    }

    public function setTablemealNumber(int $tablemeal_number): self
    {
        $this->tablemeal_number = $tablemeal_number;

        return $this;
    }

    public function getFlatware(): ?int
    {
        return $this->flatware;
    }

    public function setFlatware(int $flatware): self
    {
        $this->flatware = $flatware;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getTotalCommand(): ?float
    {
        return $this->total_command;
    }

    public function setTotalCommand(float $total_command): self
    {
        $this->total_command = $total_command;

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

    public function getTablemeal(): ?Tablemeal
    {
        return $this->tablemeal;
    }

    public function setTablemeal(?Tablemeal $tablemeal): self
    {
        $this->tablemeal = $tablemeal;

        return $this;
    }

    /**
     * @return Collection|Food[]
     */
    public function getFoods(): Collection
    {
        return $this->foods;
    }

    public function addFood(Food $food): self
    {
        if (!$this->foods->contains($food)) {
            $this->foods[] = $food;
        }

        return $this;
    }

    public function removeFood(Food $food): self
    {
        if ($this->foods->contains($food)) {
            $this->foods->removeElement($food);
        }

        return $this;
    }

    /**
     * @return Collection|Accounts[]
     */
    public function getAccounts(): Collection
    {
        return $this->accounts;
    }

    public function addAccount(Accounts $account): self
    {
        if (!$this->accounts->contains($account)) {
            $this->accounts[] = $account;
        }

        return $this;
    }

    public function removeAccount(Accounts $account): self
    {
        if ($this->accounts->contains($account)) {
            $this->accounts->removeElement($account);
        }

        return $this;
    }
}
