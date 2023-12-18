<?php

namespace App\Entity;

use App\Repository\AtelierIntervenantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierIntervenantRepository::class)]
class AtelierIntervenant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $atelier_id = null;

    #[ORM\Column]
    private ?int $intervenant_id = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIntervenantId(): ?int
    {
        return $this->intervenant_id;
    }

    public function setIntervenantId(int $intervenant_id): static
    {
        $this->intervenant_id = $intervenant_id;

        return $this;
    }
}
