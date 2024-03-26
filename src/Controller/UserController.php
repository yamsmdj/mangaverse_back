<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    private SerializerInterface $serializer;
    private UserService $userService;

    public function __construct(SerializerInterface $serializer, EntityManagerInterface $em)
    {
        $this->userService = new UserService($em);
        $this->serializer = $serializer;
    }

    #[Route('api/users', methods: ['GET'])]
    public function getAll(): Response
    {
        return new Response($this->serializer->serialize($this->userService->getAll(), 'json'));
    }

    #[Route('api/users/{id}', methods: ['GET'])]
    public function get($id): Response
    {
        return new Response($this->serializer->serialize($this->userService->get($id), 'json'));
    }

    #[Route('/api/users', methods: ['POST'])]
    public function create(#[MapRequestPayload()] User $user): Response
    {
        return new Response($this->serializer->serialize($this->userService->create($user), 'json'));
    }
    
    #[Route('api/users/{id}', methods: ['PUT'])]
    public function put(int $id, #[MapRequestPayload] User $user): Response
    {
        $message = $this->userService->updateAll($id, $user);
        return new Response($message);
    }

    #[Route('api/users/{id}', methods: ['PATCH'])]
    public function patch(int $id, #[MapRequestPayload] User $user): Response
    {
        $message = $this->userService->update($id, $user);
        return new Response($message);
    }
    
    #[Route('/api/users/{id}', methods: ['DELETE'])]
    public function remove($id): Response
    {
        $message = $this->userService->remove($id);
        return new Response($message);
    }
}

