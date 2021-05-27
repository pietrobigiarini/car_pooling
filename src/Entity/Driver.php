<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass=DriverRepository::class)
 */
class Driver
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
    private $birthPlace;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDay;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $licenceNumber;

    /**
     * @ORM\Column(type="date")
     */
    private $expiryLicence;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="driver", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Car::class, mappedBy="driver")
     */
    private $cars;

    /**
     * @ORM\OneToMany(targetEntity=JudgmentDriver::class, mappedBy="driver")
     */
    private $judgmentDrivers;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
        $this->judgmentDrivers = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    public function setBirthPlace(string $birthPlace): self
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    public function getBirthDay(): ?\DateTimeInterface
    {
        return $this->birthDay;
    }

    public function setBirthDay(\DateTimeInterface $birthDay): self
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    public function getLicenceNumber(): ?string
    {
        return $this->licenceNumber;
    }

    public function setLicenceNumber(string $licenceNumber): self
    {
        $this->licenceNumber = $licenceNumber;

        return $this;
    }

    public function getExpiryLicence(): ?\DateTimeInterface
    {
        return $this->expiryLicence;
    }

    public function setExpiryLicence(\DateTimeInterface $expiryLicence): self
    {
        $this->expiryLicence = $expiryLicence;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

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
     * @return Collection|Car[]
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): self
    {
        if (!$this->cars->contains($car)) {
            $this->cars[] = $car;
            $car->setDriver($this);
        }

        return $this;
    }

    public function removeCar(Car $car): self
    {
        if ($this->cars->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getDriver() === $this) {
                $car->setDriver(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JudgmentDriver[]
     */
    public function getJudgmentDrivers(): Collection
    {
        return $this->judgmentDrivers;
    }

    public function addJudgmentDriver(JudgmentDriver $judgmentDriver): self
    {
        if (!$this->judgmentDrivers->contains($judgmentDriver)) {
            $this->judgmentDrivers[] = $judgmentDriver;
            $judgmentDriver->setDriver($this);
        }

        return $this;
    }

    public function removeJudgmentDriver(JudgmentDriver $judgmentDriver): self
    {
        if ($this->judgmentDrivers->removeElement($judgmentDriver)) {
            // set the owning side to null (unless already changed)
            if ($judgmentDriver->getDriver() === $this) {
                $judgmentDriver->setDriver(null);
            }
        }

        return $this;
    }
}
