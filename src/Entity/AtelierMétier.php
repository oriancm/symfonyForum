<?php

namespace App\Entity;

use App\Repository\AtelierMétierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierMétierRepository::class)]
class AtelierMétier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $atelier_id = null;

    #[ORM\Column]
    private ?int $metier_id = null;

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

    public function getMetierId(): ?int
    {
        return $this->metier_id;
    }

    public function setMetierId(int $metier_id): static
    {
        $this->metier_id = $metier_id;

        return $this;
    }
}
