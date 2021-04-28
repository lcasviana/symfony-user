<?php

namespace App\Repository;

use App\Entity\Address;
use Doctrine\ORM\EntityManagerInterface;

class AddressRepository
{
    private $entityManager;

    private $objectRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Address::class);
    }

    public function find(int $id): Address
    {
        return $this->objectRepository->find($id);
    }

    public function findAll(): array
    {
        return $this->objectRepository->findAll();
    }

    public function remove(Address $address): void
    {
        $this->entityManager->remove($address);
        $this->entityManager->flush();
    }

    public function save(Address $address): void
    {
        $this->entityManager->persist($address);
        $this->entityManager->flush();
    }
}
