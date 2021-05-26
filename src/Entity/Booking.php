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

    /**
     * @ORM\Column(type="integer")
     */
    private $passengerVote;

    /**
     * @ORM\Column(type="integer")
     */
    private $driverVote;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $passengerFeedback;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $driverFeedback;

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

    public function getPassengerVote(): ?int
    {
        return $this->passengerVote;
    }

    public function setPassengerVote(int $passengerVote): self
    {
        $this->passengerVote = $passengerVote;

        return $this;
    }

    public function getDriverVote(): ?int
    {
        return $this->driverVote;
    }

    public function setDriverVote(int $driverVote): self
    {
        $this->driverVote = $driverVote;

        return $this;
    }

    public function getPassengerFeedback(): ?string
    {
        return $this->passengerFeedback;
    }

    public function setPassengerFeedback(?string $passengerFeedback): self
    {
        $this->passengerFeedback = $passengerFeedback;

        return $this;
    }

    public function getDriverFeedback(): ?string
    {
        return $this->driverFeedback;
    }

    public function setDriverFeedback(?string $driverFeedback): self
    {
        $this->driverFeedback = $driverFeedback;

        return $this;
    }
}
