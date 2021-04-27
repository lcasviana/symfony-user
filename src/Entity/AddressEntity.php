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

    public function __construct(
        $userId,
        $pais,
        $estado,
        $cidade,
        $bairro,
        $rua,
        $numero,
        $complemento,
        $cep,
    ) {
        $this->userId = $userId;
        $this->pais = $pais;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->cep = $cep;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getCep()
    {
        return $this->cep;
    }
}
