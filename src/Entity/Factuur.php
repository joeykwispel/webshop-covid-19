<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurRepository")
 */
class Factuur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\klant", inversedBy="factuurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $klant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $factuur_nummer;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $factuur_korting;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Btw_nummer;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $verval_date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FactuurProducten", mappedBy="Factuur")
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

    public function getKlant(): ?klant
    {
        return $this->klant;
    }

    public function setKlant(?klant $klant): self
    {
        $this->klant = $klant;

        return $this;
    }

    public function getFactuurNummer(): ?string
    {
        return $this->factuur_nummer;
    }

    public function setFactuurNummer(string $factuur_nummer): self
    {
        $this->factuur_nummer = $factuur_nummer;

        return $this;
    }

    public function getFactuurKorting(): ?string
    {
        return $this->factuur_korting;
    }

    public function setFactuurKorting(?string $factuur_korting): self
    {
        $this->factuur_korting = $factuur_korting;

        return $this;
    }

    public function getBtwNummer(): ?string
    {
        return $this->Btw_nummer;
    }

    public function setBtwNummer(string $Btw_nummer): self
    {
        $this->Btw_nummer = $Btw_nummer;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getVervalDate(): ?\DateTimeInterface
    {
        return $this->verval_date;
    }

    public function setVervalDate(?\DateTimeInterface $verval_date): self
    {
        $this->verval_date = $verval_date;

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
            $factuurProducten->setFactuur($this);
        }

        return $this;
    }

    public function removeFactuurProducten(FactuurProducten $factuurProducten): self
    {
        if ($this->factuurProductens->contains($factuurProducten)) {
            $this->factuurProductens->removeElement($factuurProducten);
            // set the owning side to null (unless already changed)
            if ($factuurProducten->getFactuur() === $this) {
                $factuurProducten->setFactuur(null);
            }
        }

        return $this;
    }
}
