<?php

namespace App\Repository;

use App\Entity\User;
use App\Db\Mysql;
use App\Tools\StringTools;

class UserRepository extends Repository
{

    public function findOneById(int $user_id): bool|User
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
        $query->bindParam(':user_id', $user_id, $this->pdo::PARAM_STR);
        $query->execute();
        $user = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($user) {
            return User::createAndHydrate($user);;
        } else {
            return false;
        }
    }
    
    public function findOneByEmail(string $email): bool|User
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $email, $this->pdo::PARAM_STR);
        $query->execute();
        $user = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($user) {
            return User::createAndHydrate($user);;
        } else {
            return false;
        }
    }

    public function persist(User $user): bool
    {
        
        if ($user->getUserId() !== null) {
                $query = $this->pdo->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, pseudo = :pseudo, email = :email, password = :password WHERE user_id = :user_id'
                );
                $query->bindValue(':user_id', $user->getUserId(), $this->pdo::PARAM_INT);

        } else {
            $query = $this->pdo->prepare('INSERT INTO users (first_name, last_name, pseudo, email, password, role) VALUES (:first_name, :last_name, :pseudo, :email, :password, :role)');
            $query->bindValue(':role', $user->getRole(), $this->pdo::PARAM_STR);
        }

        $query->bindValue(':first_name', $user->getFirstName(), $this->pdo::PARAM_STR);
        $query->bindValue(':last_name', $user->getLastName(), $this->pdo::PARAM_STR);
        $query->bindValue(':pseudo', $user->getPseudo(), $this->pdo::PARAM_STR);
        $query->bindValue(':email', $user->getEmail(), $this->pdo::PARAM_STR);
        $query->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT), $this->pdo::PARAM_STR);

        return $query->execute();
    }

}