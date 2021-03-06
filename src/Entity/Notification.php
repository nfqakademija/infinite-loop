<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 */
class Notification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdOn;

    /**
     * @ORM\Column(type="boolean", name="is_read")
     */
    private $read = false;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $readOn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="notifications")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Challenge", inversedBy="notifications")
     * @ORM\JoinColumn(name="challenge_id", referencedColumnName="id")
     */
    private $challenge;

    /**
     * @var
     */
    private $targetedUsername;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->challenge = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    /**
     * @param \DateTimeInterface $createdOn
     * @return Notification
     */
    public function setCreatedOn(\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRead(): ?bool
    {
        return $this->read;
    }

    /**
     * @param bool $read
     * @return Notification
     */
    public function setRead(bool $read): self
    {
        $this->read = $read;

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
     * @param string $description
     * @return Notification
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getReadOn(): ?\DateTimeInterface
    {
        return $this->readOn;
    }

    /**
     * @param \DateTimeInterface $readOn
     * @return Notification
     */
    public function setReadOn(\DateTimeInterface $readOn): self
    {
        $this->readOn = $readOn;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return Notification
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getChallenge()
    {
        return $this->challenge;
    }

    /**
     * @param string $targetedUsername
     * @return Notification
     */
    public function setTargetedUsername(string $targetedUsername)
    {
        $this->targetedUsername = $targetedUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetedUsername(): ?string
    {
        return $this->targetedUsername;
    }

    /**
     * @param Challenge|null $challenge
     * @return Notification
     */
    public function setChallenge(?Challenge $challenge): self
    {
        $this->challenge = $challenge;

        return $this;
    }
}
