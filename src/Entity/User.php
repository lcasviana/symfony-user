<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Name is required.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Name must have at least 3 characters.",
     *     maxMessage="Name longer than 255 characters is not supported."
     * )
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Surname is required.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Surname must have at least 3 characters.",
     *     maxMessage="Surname longer than 255 characters is not supported."
     * )
     */
    private string $surname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Email is required.")
     * @Assert\Length(
     *     max=255,
     *     maxMessage="Email longer than 255 characters is not supported."
     * )
     * @Assert\Email(message="Invalid email.")
     */
    private string $email;

    /**
     * @ORM\ManyToOne(targetEntity="Address", cascade="persist")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(name="address_id", referencedColumnName="id")},
     * )
     */
    private Address $address;

    /**
     * @ORM\ManyToMany(targetEntity="Phone", cascade="persist")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="phone_id", referencedColumnName="id", unique=true)}
     * )
     */
    private $phones; // ArrayCollection?

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $updatedAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->updatedAt = new \DateTime();
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->updatedAt = new \DateTime();
        $this->surname = $surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->updatedAt = new \DateTime();
        $this->email = $email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): void
    {
        $this->updatedAt = new \DateTime();
        $this->address = $address;
    }

    public function getPhones()
    {
        return $this->phones;
    }

    public function setPhones($phones): void
    {
        $this->updatedAt = new \DateTime();
        $this->phones = $phones;
    }
}
