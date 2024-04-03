<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{

    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    // #[Route("/", name: "Home")]
    // function index(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher, User $users)
    // {
    //     $user = new User();
    //     $user->setEmail($users->getUserIdentifier())
    //         ->setRoles([])
    //         ->setPassword($hasher->hashPassword($user,$users->getPassword()));
    //     $em->persist($user);
    //     $em->flush();
    //     return $user;
    // }
}
