<?php

namespace App\Entity;

use App\Repository\JudgmentPassengerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JudgmentPassengerRepository::class)
 */
class JudgmentPassenger
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $feedbackPassenger;

    /**
     * @ORM\Column(type="integer")
     */
    private $votePassenger;

    /**
     * @ORM\ManyToOne(targetEntity=Passenger::class, inversedBy="judgmentPassengers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $passenger;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFeedbackPassenger(): ?string
    {
        return $this->feedbackPassenger;
    }

    public function setFeedbackPassenger(string $feedbackPassenger): self
    {
        $this->feedbackPassenger = $feedbackPassenger;

        return $this;
    }

    public function getVotePassenger(): ?int
    {
        return $this->votePassenger;
    }

    public function setVotePassenger(int $votePassenger): self
    {
        $this->votePassenger = $votePassenger;

        return $this;
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
}
