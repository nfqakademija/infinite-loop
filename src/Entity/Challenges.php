<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChallangesRepository")
 */
class Challenges
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     * @ORM\Column(type="datetime")
     */
    private $endDate;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="challenges")
     * @ORM\JoinTable(name="user_challenges")
     * @var ArrayCollection
     */
    private $userChallenges;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Milestone", mappedBy="challenge")
     * @var ArrayCollection
     */
    private $milestones;

    /**
     * @return ArrayCollection
     */
    public function getMilestones(): ArrayCollection
    {
        return $this->milestones;
    }

    /**
     * @param ArrayCollection $milestones
     */
    public function setMilestones(ArrayCollection $milestones): void
    {
        $this->milestones = $milestones;
    }

    /**
     * @return mixed
     */
    public function getUserChallenges()
    {
        return $this->userChallenges;
    }

    /**
     * @param mixed $userChallenges
     */
    public function setUserChallenges($userChallenges): void
    {
        $this->userChallenges = $userChallenges;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Challenges
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return Challenges
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeInterface $startDate
     * @return Challenges
     */
    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param \DateTimeInterface $endDate
     * @return Challenges
     */
    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function __construct()
    {
        $this->userChallenges = new ArrayCollection();
        $this->milestones = new ArrayCollection();
    }
}
