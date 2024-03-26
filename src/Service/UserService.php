<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function create(User $user): User
    {
        $newUser = new User();
        $newUser->setEmail($user->getEmail());
        $newUser->setPassword($user->getPassword());
        $newUser->setTel($user->getTel());
        $newUser->setRoleUser($user->getRoleUser());
        $newUser->setCreatedAt(new \DateTimeImmutable());

        $this->em->persist($newUser);
        $this->em->flush();
        return $newUser;
    }

    public function getAll()
    {
        return $this->em->getRepository(User::class)->findAll();
    }
    public function get(int $id)
    {
        return $this->em->getRepository(User::class)->find($id);
    }
    public function updateAll(int $id, User $user): string
    {
        $existingUser = $this->em->getRepository(User::class)->find($id);
        if ($existingUser) {
            $existingUser
                ->setEmail($user->getEmail())
                ->setPassword($user->getPassword())
                ->setTel($user->getTel())
                ->setRoleUser($user->getRoleUser())
                ->setCreatedAt($user->getCreatedAt());
                // ->setStatus($user->isStatus());

            $this->em->flush();
            return "Le produit avec l'ID {$id} a été mis a jour avec succès!";
        } else {
            return "Le produit avec l'ID {$id} n'existe pas gros";
        }
    }


    public function update(int $id, User $user): string
    {
        $existingUser = $this->em->getRepository(User::class)->find($id);

        if ($existingUser) {
            $existingUser->setEmail($user->getEmail() ?? $existingUser->getEmail());
            $existingUser->setPassword($user->getPassword() ?? $existingUser->getPassword());
            $existingUser->setTel($user->getTel() ?? $existingUser->getTel());
            $existingUser->setRoleUser($user->getRoleUser() ?? $existingUser->getRoleUser());
            $existingUser->setCreatedAt($user->getCreatedAt() ?? $existingUser->getCreatedAt());
            // $existingUser->setStatus($user->isStatus() ?? $existingUser->isStatus());


            $this->em->flush();

            return "Le produit avec l'ID {$id} a été mis à jour avec succès !";
        } else {
            return "Le produit avec l'ID {$id} n'existe pas.";
        }
    }

    public function remove($id)
    {

        $user = $this->em->getRepository(User::class)->find($id);

        if ($user) {
            $this->em->remove($user);
            $this->em->flush();
            return "L'élément avec l'id $id a été supprimé avec succès.";
        } else {
            return "Aucun élément avec l'id $id n'a été trouvé.";
        }
    }
}
