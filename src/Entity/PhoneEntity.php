<?php

namespace App\Entity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhoneRepository")
 */
class PhoneEntity
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
}
