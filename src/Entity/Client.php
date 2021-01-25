<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "Ваше имя должно быть как минимум {{ limit }} символов",
     *      maxMessage = "Ваше имя не должно быть длиннее {{ limit }} символов"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "Ваше имя должно быть как минимум {{ limit }} символов",
     *      maxMessage = "Ваше имя не должно быть длиннее {{ limit }} символов"
     * )
     */
    private $fname;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=12, unique=true)
     * @Assert\NotBlank()
     * @Assert\Regex("/^(89|\+79)[0-9]{9}/")
     */
    private $phone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $userDataProcessing;

    /**
     * @ORM\OneToMany(targetEntity=Education::class, mappedBy="client", cascade={"persist", "remove"})
     */
    private $educations;

    /**
     * @ORM\OneToOne(targetEntity=Scoring::class, inversedBy="client", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $scoring;

    public function __construct()
    {
        $this->educations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function setFname(string $fname): self
    {
        $this->fname = $fname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getUserDataProcessing(): ?bool
    {
        return $this->userDataProcessing;
    }

    public function setUserDataProcessing(?bool $userDataProcessing): self
    {
        $this->userDataProcessing = $userDataProcessing;

        return $this;
    }

    /**
     * @return Collection|Education[]
     */
    public function getEducations(): Collection
    {
        return $this->educations;
    }

    public function addEducation(Education $education): self
    {
        if (!$this->educations->contains($education)) {
            $this->educations[] = $education;
            $education->setClient($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): self
    {
        if ($this->educations->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getClient() === $this) {
                $education->setClient(null);
            }
        }

        return $this;
    }

    public function getScoring(): ?Scoring
    {
        return $this->scoring;
    }

    public function setScoring(Scoring $scoring): self
    {
        $this->scoring = $scoring;

        return $this;
    }
}
