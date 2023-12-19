<?php

namespace App\Entity;

use App\Repository\AtelierLyceenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierLyceenRepository::class)]
class AtelierLyceen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $atelier_id = null;

    #[ORM\Column]
    private ?int $lyceen_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAtelierId(): ?int
    {
        return $this->atelier_id;
    }

    public function setAtelierId(int $atelier_id): static
    {
        $this->atelier_id = $atelier_id;

        return $this;
    }

    public function getLyceenId(): ?int
    {
        return $this->lyceen_id;
    }

    public function setLyceenId(int $lyceen_id): static
    {
        $this->lyceen_id = $lyceen_id;

        return $this;
    }
}
