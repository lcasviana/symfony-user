<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

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
        return new JsonResponse(['status' => 'Ok'], Response::HTTP_OK);
    }

    /**
     * @Route("/users/{id}", methods={"PUT"})
     */
    public function modifyUser($id, Request $request): Response
    {
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
