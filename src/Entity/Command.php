<?php

namespace App\Entity;

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
}
