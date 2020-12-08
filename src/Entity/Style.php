<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StyleRepository::class)
 */
class Style
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
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity=Artist::class, mappedBy="style")
     */
    private $Artists;

    public function __construct()
    {
        $this->Artists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Artist[]
     */
    public function getArtists(): Collection
    {
        return $this->Artists;
    }

    public function addArtist(Artist $artist): self
    {
        if (!$this->Artists->contains($artist)) {
            $this->Artists[] = $artist;
            $artist->setStyle($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        if ($this->Artists->removeElement($artist)) {
            // set the owning side to null (unless already changed)
            if ($artist->getStyle() === $this) {
                $artist->setStyle(null);
            }
        }

        return $this;
    }
}
