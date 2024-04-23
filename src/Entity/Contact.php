<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as ASSERT;
use Symfony\Bridge\Doctrine\Validator\Constraints;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
#[UniqueEntity('email')]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[ASSERT\NotBlank (message:"veuillez entrez un nom ")]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[ASSERT\NotBlank (message:"veuillez entrez un prénom ")]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[ASSERT\NotBlank (message:"veuillez entrez un email ")]
    #[Assert\Email (message:"Entrez un mail valide")]
    private ?string $email = null;

    #[ORM\Column]
    #[ASSERT\NotBlank (message:"veuillez entrez un numéro de téléphone ")]
   
    private ?int $numberPhone = null;

    #[ORM\Column(type: Types::TEXT)]
    #[ASSERT\NotBlank (message:"veuillez entrez un message")]
    private ?string $message = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]

    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getNumberPhone(): ?int
    {
        return $this->numberPhone;
    }

    public function setNumberPhone(int $numberPhone): static
    {
        $this->numberPhone = $numberPhone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }
}
