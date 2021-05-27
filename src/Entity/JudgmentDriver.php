<?php

namespace App\Entity;

use App\Repository\JudgmentDriverRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JudgmentDriverRepository::class)
 */
class JudgmentDriver
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $feedbackDriver;

    /**
     * @ORM\Column(type="integer")
     */
    private $voteDriver;

    /**
     * @ORM\ManyToOne(targetEntity=Driver::class, inversedBy="judgmentDrivers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $driver;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFeedbackDriver(): ?string
    {
        return $this->feedbackDriver;
    }

    public function setFeedbackDriver(?string $feedbackDriver): self
    {
        $this->feedbackDriver = $feedbackDriver;

        return $this;
    }

    public function getVoteDriver(): ?int
    {
        return $this->voteDriver;
    }

    public function setVoteDriver(int $voteDriver): self
    {
        $this->voteDriver = $voteDriver;

        return $this;
    }

    public function getDriver(): ?Driver
    {
        return $this->driver;
    }

    public function setDriver(?Driver $driver): self
    {
        $this->driver = $driver;

        return $this;
    }
}
