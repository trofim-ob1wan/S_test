<?php

namespace App\Entity;

use App\Repository\ScoringRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ScoringRepository::class)
 */
class Scoring
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $balls;

    /**
     * @ORM\OneToOne(targetEntity=Client::class, mappedBy="scoring", cascade={"persist", "remove"})
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBalls(): ?int
    {
        return $this->balls;
    }

    public function setBalls(int $balls): self
    {
        $this->balls = $balls;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        // set the owning side of the relation if necessary
        if ($client->getScoring() !== $this) {
            $client->setScoring($this);
        }

        $this->client = $client;

        return $this;
    }
}
