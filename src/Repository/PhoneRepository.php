<?php

namespace App\Repository;

use App\Entity\Phone;
use Doctrine\ORM\EntityManagerInterface;

class PhoneRepository
{
    private $entityManager;

    private $objectRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Phone::class);
    }

    public function find(int $id): Phone
    {
        return $this->objectRepository->find($id);
    }

    public function findAll(): array
    {
        return $this->objectRepository->findAll();
    }

    public function remove(Phone $phone): void
    {
        $this->entityManager->remove($phone);
        $this->entityManager->flush();
    }

    public function save(Phone $phone): void
    {
        $this->entityManager->persist($phone);
        $this->entityManager->flush();
    }
}
