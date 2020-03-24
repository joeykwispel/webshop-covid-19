<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=0)
     */
    private $Btw;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FactuurProducten", mappedBy="Product")
     */
    private $factuurProductens;

    public function __construct()
    {
        $this->factuurProductens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getBtw(): ?string
    {
        return $this->Btw;
    }

    public function setBtw(string $Btw): self
    {
        $this->Btw = $Btw;

        return $this;
    }

    /**
     * @return Collection|FactuurProducten[]
     */
    public function getFactuurProductens(): Collection
    {
        return $this->factuurProductens;
    }

    public function addFactuurProducten(FactuurProducten $factuurProducten): self
    {
        if (!$this->factuurProductens->contains($factuurProducten)) {
            $this->factuurProductens[] = $factuurProducten;
            $factuurProducten->setProduct($this);
        }

        return $this;
    }

    public function removeFactuurProducten(FactuurProducten $factuurProducten): self
    {
        if ($this->factuurProductens->contains($factuurProducten)) {
            $this->factuurProductens->removeElement($factuurProducten);
            // set the owning side to null (unless already changed)
            if ($factuurProducten->getProduct() === $this) {
                $factuurProducten->setProduct(null);
            }
        }

        return $this;
    }
}
