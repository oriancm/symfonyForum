<?php

namespace App\Entity;

use App\Repository\SponsorsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SponsorsRepository::class)]
class Sponsors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $logo = null;

    #[ORM\Column(length: 255)]
    private ?string $url_redirection = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getUrlRedirection(): ?string
    {
        return $this->url_redirection;
    }

    public function setUrlRedirection(string $url_redirection): static
    {
        $this->url_redirection = $url_redirection;

        return $this;
    }
}
