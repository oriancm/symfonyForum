<?php

namespace App\Entity;

use App\Repository\QuestionnairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionnairesRepository::class)]
class Questionnaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $lyceen_id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $question = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $réponse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getRéponse(): ?string
    {
        return $this->réponse;
    }

    public function setRéponse(string $réponse): static
    {
        $this->réponse = $réponse;

        return $this;
    }
}
