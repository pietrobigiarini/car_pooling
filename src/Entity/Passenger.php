<?php

namespace App\Entity;

use App\Repository\PassengerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PassengerRepository::class)
 */
class Passenger
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $documententCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $documentType;

    /**
     * @ORM\Column(type="date")
     */
    private $expiryDocument;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="passenger", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumententCode(): ?int
    {
        return $this->documententCode;
    }

    public function setDocumententCode(int $documententCode): self
    {
        $this->documententCode = $documententCode;

        return $this;
    }

    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    public function setDocumentType(string $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    public function getExpiryDocument(): ?\DateTimeInterface
    {
        return $this->expiryDocument;
    }

    public function setExpiryDocument(\DateTimeInterface $expiryDocument): self
    {
        $this->expiryDocument = $expiryDocument;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
