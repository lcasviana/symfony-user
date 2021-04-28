<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Estado is required.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Estado must have at least 3 characters.",
     *     maxMessage="Estado longer than 255 characters is not supported."
     * )
     */
    private string $estado;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Cidade is required.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Cidade must have at least 3 characters.",
     *     maxMessage="Cidade longer than 255 characters is not supported."
     * )
     */
    private string $cidade;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Bairro is required.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Bairro must have at least 3 characters.",
     *     maxMessage="Bairro longer than 255 characters is not supported."
     * )
     */
    private string $bairro;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Rua is required.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Rua must have at least 3 characters.",
     *     maxMessage="Rua longer than 255 characters is not supported."
     * )
     */
    private string $rua;

    /**
     * @ORM\Column(type="string", length=16)
     * @Assert\NotBlank(message="Numero is required.")
     * @Assert\Length(
     *     min=1,
     *     max=16,
     *     minMessage="Numero must have at least 1 characters.",
     *     maxMessage="Numero longer than 16 characters is not supported."
     * )
     */
    private string $numero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     min=1,
     *     max=255,
     *     minMessage="Complemento must have at least 1 characters.",
     *     maxMessage="Complemento longer than 255 characters is not supported."
     * )
     */
    private ?string $complemento;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    public function getRua(): string
    {
        return $this->rua;
    }

    public function setRua(string $rua): void
    {
        $this->rua = $rua;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): void
    {
        $this->complemento = $complemento;
    }
}
