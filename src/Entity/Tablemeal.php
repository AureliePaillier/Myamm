<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TablemealRepository")
 */
class Tablemeal
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
    private $tablemeal_number;

    public function getId(): ?int
    {
        return $this->id;
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
}
