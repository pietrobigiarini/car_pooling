<?php

namespace App\Entity;

use App\Repository\TripRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass=TripRepository::class)
 */
class Trip
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departureCity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destinationCity;

    /**
     * @ORM\Column(type="date")
     */
    private $departureDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $baggage;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $contribution;

    /**
     * @ORM\Column(type="integer")
     */
    private $travelTime;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $animal;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $stop;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="traver")
     */
    private $bookings;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="trips")
     * @JoinColumn(name="car", referencedColumnName="plate")
     */
    private $car;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartureCity(): ?string
    {
        return $this->departureCity;
    }

    public function setDepartureCity(string $departureCity): self
    {
        $this->departureCity = $departureCity;

        return $this;
    }

    public function getDestinationCity(): ?string
    {
        return $this->destinationCity;
    }

    public function setDestinationCity(string $destinationCity): self
    {
        $this->destinationCity = $destinationCity;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getBaggage(): ?bool
    {
        return $this->baggage;
    }

    public function setBaggage(bool $baggage): self
    {
        $this->baggage = $baggage;

        return $this;
    }

    public function getContribution(): ?string
    {
        return $this->contribution;
    }

    public function setContribution(string $contribution): self
    {
        $this->contribution = $contribution;

        return $this;
    }

    public function getTravelTime(): ?int
    {
        return $this->travelTime;
    }

    public function setTravelTime(int $travelTime): self
    {
        $this->travelTime = $travelTime;

        return $this;
    }

    public function getAnimal(): ?bool
    {
        return $this->animal;
    }

    public function setAnimal(?bool $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    public function getStop(): ?bool
    {
        return $this->stop;
    }

    public function setStop(?bool $stop): self
    {
        $this->stop = $stop;

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
            $booking->setTraver($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getTraver() === $this) {
                $booking->setTraver(null);
            }
        }

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }
}
