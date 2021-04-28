<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="phone")
 */
class Phone
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=2)
     * @Assert\NotBlank(message="Area code is required.")
     * @Assert\Regex(
     *     pattern="/^\d{2}$",
     *     message="Invalid area code."
     * )
     */
    private string $areaCode;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank(message="Number is required.")
     * @Assert\Regex(
     *     pattern="/^\d?\d{4}\-\d{4}$",
     *     message="Invalid number."
     * )
     */
    private string $number;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAreaCode(): string
    {
        return $this->areaCode;
    }

    public function setAreaCode(string $areaCode): void
    {
        $this->areaCode = $areaCode;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }
}
