<?php

namespace App\Entity;

use App\Repository\AteliersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AteliersRepository::class)]
class Ateliers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $secteur_id = null;
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $salle_id = null;
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $metier_id = null;
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $ressource_id = null;
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $forum_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $heure_depart = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSecteurId(): ?int
    {
        return $this->secteur_id;
    }

    public function setSecteurId(int $secteur_id): static
    {
        $this->secteur_id = $secteur_id;

        return $this;
    }
    public function getSalleId(): ?int
    {
        return $this->salle_id;
    }

    public function setSalleId(int $salle_id): static
    {
        $this->salle_id = $salle_id;

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
    public function getRessourceId(): ?int
    {
        return $this->ressource_id;
    }

    public function setRessourceId(int $ressource_id): static
    {
        $this->ressource_id = $ressource_id;

        return $this;
    }
    public function getForumId(): ?int
    {
        return $this->forum_id;
    }

    public function setForumId(int $forum_id): static
    {
        $this->forum_id = $forum_id;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heure_depart;
    }

    public function setHeureDepart(\DateTimeInterface $heure_depart): static
    {
        $this->heure_depart = $heure_depart;

        return $this;
    }
}
