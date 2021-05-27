<?php

namespace App\Entity;

use App\Repository\PassengerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string",  length=10)
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

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="passenger")
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity=JudgmentPassenger::class, mappedBy="passenger")
     */
    private $judgmentPassengers;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->judgmentPassengers = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumententCode(): ?string
    {
        return $this->documententCode;
    }

    public function setDocumententCode(string $documententCode): self
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

    /**
     * @return Collection|Booking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setPassenger($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getPassenger() === $this) {
                $booking->setPassenger(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JudgmentPassenger[]
     */
    public function getJudgmentPassengers(): Collection
    {
        return $this->judgmentPassengers;
    }

    public function addJudgmentPassenger(JudgmentPassenger $judgmentPassenger): self
    {
        if (!$this->judgmentPassengers->contains($judgmentPassenger)) {
            $this->judgmentPassengers[] = $judgmentPassenger;
            $judgmentPassenger->setPassenger($this);
        }

        return $this;
    }

    public function removeJudgmentPassenger(JudgmentPassenger $judgmentPassenger): self
    {
        if ($this->judgmentPassengers->removeElement($judgmentPassenger)) {
            // set the owning side to null (unless already changed)
            if ($judgmentPassenger->getPassenger() === $this) {
                $judgmentPassenger->setPassenger(null);
            }
        }

        return $this;
    }
}
