<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Trip::class, inversedBy="bookings")
     */
    private $traver;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Passenger::class, inversedBy="bookings")
     */
    private $passenger;

    /**
     * @ORM\Column(type="boolean")
     */
    private $availability;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassenger(): ?Passenger
    {
        return $this->passenger;
    }

    public function setPassenger(?Passenger $passenger): self
    {
        $this->passenger = $passenger;

        return $this;
    }

    public function getTraver(): ?Trip
    {
        return $this->traver;
    }

    public function setTraver(?Trip $traver): self
    {
        $this->traver = $traver;

        return $this;
    }

    public function getAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }
}
