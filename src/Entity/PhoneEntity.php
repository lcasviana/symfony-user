<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhoneRepository")
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
     * @ORM\Column(type="integer")
     */
    private int $userId;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private string $areaCode;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private string $number;

    public function __construct(
        $userId,
        $areaCode,
        $number,
    ) {
        $this->userId = $userId;
        $this->areaCode = $areaCode;
        $this->number = $number;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getAreaCode()
    {
        return $this->areaCode;
    }

    public function getNumber()
    {
        return $this->number;
    }
}
