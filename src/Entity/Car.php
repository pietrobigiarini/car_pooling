<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $plate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\OneToMany(targetEntity=Driver::class, mappedBy="car")
     */
    private $driver;

    public function __construct()
    {
        $this->driver = new ArrayCollection();
    }

    public function getPlate(): ?int
    {
        return $this->plate;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return Collection|Driver[]
     */
    public function getDriver(): Collection
    {
        return $this->driver;
    }

    public function addDriver(Driver $driver): self
    {
        if (!$this->driver->contains($driver)) {
            $this->driver[] = $driver;
            $driver->setCar($this);
        }

        return $this;
    }

    public function removeDriver(Driver $driver): self
    {
        if ($this->driver->removeElement($driver)) {
            // set the owning side to null (unless already changed)
            if ($driver->getCar() === $this) {
                $driver->setCar(null);
            }
        }

        return $this;
    }
}
