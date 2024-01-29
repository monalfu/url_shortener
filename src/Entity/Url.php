<?php

namespace App\Entity;

use App\Repository\UrlRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UrlRepository::class)]
class Url
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url_real = null;

    #[ORM\Column(length: 255)]
    private ?string $url_corta = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creation_date = null;

    #[ORM\ManyToOne(inversedBy: 'urls')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column]
    private int $accesos = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlReal(): ?string
    {
        return $this->url_real;
    }

    public function setUrlReal(string $url_real): static
    {
        $this->url_real = $url_real;

        return $this;
    }

    public function getUrlCorta(): ?string
    {
        return $this->url_corta;
    }

    public function setUrlCorta(string $url_corta): static
    {
        $this->url_corta = $url_corta;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): static
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getAccesos(): ?int
    {
        return $this->accesos;
    }

    public function setAccesos(int $accesos): static
    {
        $this->accesos = $accesos;

        return $this;
    }

    public function incrementarAccesos()
    {
        $this->accesos++;

        return $this;
    }
}
