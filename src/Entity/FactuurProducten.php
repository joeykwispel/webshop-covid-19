<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurProductenRepository")
 */
class FactuurProducten
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\factuur", inversedBy="factuurProductens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $factuur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\product", inversedBy="factuurProductens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\Column(type="integer")
     */
    private $aantal;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prijs;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=2)
     */
    private $totaal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuur(): ?factuur
    {
        return $this->factuur;
    }

    public function setFactuur(?factuur $factuur): self
    {
        $this->factuur = $factuur;

        return $this;
    }

    public function getProduct(): ?product
    {
        return $this->product;
    }

    public function setProduct(?product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    public function getPrijs(): ?string
    {
        return $this->prijs;
    }

    public function setPrijs(string $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    public function getTotaal(): ?string
    {
        return $this->totaal;
    }

    public function setTotaal(string $totaal): self
    {
        $this->totaal = $totaal;

        return $this;
    }
}
