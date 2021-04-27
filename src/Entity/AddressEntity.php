<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
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
     * @ORM\Column(type="string", length=255)
     */
    private string $pais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $estado;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $cidade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $bairro;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private string $rua;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $complemento;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private string $cep;
}
