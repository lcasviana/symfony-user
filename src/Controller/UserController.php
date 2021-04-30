<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController
{
    private $repository;

    public function __construct(
        private EntityManagerInterface $entityManager,
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
    ) {
        $this->repository = $entityManager->getRepository(User::class);
    }

    #[Route("/users", methods: ["GET"])]
    public function obtainAll(): Response
    {
        $users = $this->repository->findAll();
        $response = $this->serializer->serialize($users, 'json');
        return JsonResponse::fromJsonString($response);
    }

    #[Route("/users/{id}", methods: ["GET"])]
    public function obtainUser(int $id): Response
    {
        $user = $this->repository->find($id);
        if ($user == null)
            return new JsonResponse(['error' => 'Not found.'], Response::HTTP_NOT_FOUND);

        return JsonResponse::fromJsonString($this->serializer->serialize($user, 'json'));
    }

    #[Route("/users", methods: ["POST"])]
    public function insertUser(Request $request): Response
    {
        $user = $this->serializer->deserialize($request->getContent(), User::class, 'json');

        $errors = $this->validator->validate($user);
        if (count($errors) > 0) {
            $violations = array_map(function (ConstraintViolationInterface $violation) {
                return [
                    'path' => $violation->getPropertyPath(),
                    'message' => $violation->getMessage()
                ];
            }, iterator_to_array($errors));

            $response = [
                'error' => 'Bad request.',
                'violations' => $violations
            ];

            return new JsonResponse($response, Response::HTTP_BAD_REQUEST);
        }

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return new JsonResponse(['status' => 'Created.'], Response::HTTP_CREATED);
    }

    #[Route("/users/{id}", methods: ["PUT"])]
    public function updateUser(int $id, Request $request): Response
    {
        $user = $this->repository->find($id);
        if ($user == null)
            return new JsonResponse(['error' => 'Not found'], Response::HTTP_NOT_FOUND);

        $newUser = $this->serializer->deserialize($request->getContent(), User::class, 'json');

        $errors = $this->validator->validate($newUser);
        if (count($errors) > 0) {
            $violations = array_map(function (ConstraintViolationInterface $violation) {
                return [
                    'path' => $violation->getPropertyPath(),
                    'message' => $violation->getMessage()
                ];
            }, iterator_to_array($errors));

            $response = [
                'error' => 'Bad request.',
                'violations' => $violations
            ];

            return new JsonResponse($response, Response::HTTP_BAD_REQUEST);
        }

        $user->setName($newUser->getName());
        $user->setSurname($newUser->getSurname());
        $user->setEmail($newUser->getEmail());
        $user->setAddress($newUser->getAddress());
        $user->setPhones($newUser->getPhones());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return new JsonResponse(['status' => 'Updated.'], Response::HTTP_ACCEPTED);
    }

    #[Route("/users/{id}", methods: ["DELETE"])]
    public function removeUser($id): Response
    {
        $user = $this->repository->find($id);
        if ($user == null)
            return new JsonResponse(['error' => 'Not found.'], Response::HTTP_NOT_FOUND);

        $this->entityManager->remove($user);
        $this->entityManager->flush();

        return new JsonResponse(['status' => 'Deleted.'], Response::HTTP_OK);
    }
}
