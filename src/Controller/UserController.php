<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    private $repository;

    public function __construct(
        private EntityManagerInterface $entityManager,
        // private ValidatorInterface $validator,
    ) {
        $repository = $entityManager->getRepository(User::class);
    }

    /**
     * @Route("/users/{id}", methods={"GET"})
     */
    public function obtainUser($id): Response
    {
        return new JsonResponse(['status' => 'Ok'], Response::HTTP_OK);
    }

    /**
     * @Route("/users", methods={"POST"})
     */
    public function insertUser(Request $request): Response
    {
        $user = $this->serializer->deserialize($request->getContent(), User::class, 'json');
        $errors = $this->validator->validate($user);
        if (count($errors) > 0)
            return new JsonResponse(['error' => ':('], Response::HTTP_BAD_REQUEST);
        return new JsonResponse(['status' => 'Ok'], Response::HTTP_OK);
    }

    /**
     * @Route("/users/{id}", methods={"PUT"})
     */
    public function updateUser($id, Request $request): Response
    {
        $user = $this->serializer->deserialize($request->getContent(), User::class, 'json');
        $errors = $this->validator->validate($user);
        if (count($errors) > 0)
            return new JsonResponse(['error' => ':('], Response::HTTP_BAD_REQUEST);
        return new JsonResponse(['status' => 'Ok'], Response::HTTP_OK);
    }

    /**
     * @Route("/users/{id}", methods={"DELETE"})
     */
    public function removeUser($id): Response
    {
        return new JsonResponse(['status' => 'Ok'], Response::HTTP_OK);
    }
}
