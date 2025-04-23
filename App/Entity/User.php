<?php

namespace App\Entity;

use App\Db\Mysql;
use App\Tools\BddTools;

class User extends Entity
{
    protected ?int $id = null;
    protected ?string $email = '';
    protected ?string $password = '';
    protected ?string $first_name = '';
    protected ?string $last_name = '';
    protected ?string $pseudo = '';
    protected ?string $role = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /*
        Pourrait être déplacé dans une classe UserValidator
    */
    public function validate(): array
    {
        $errors = [];
        $mysql = Mysql::getInstance();
        if (empty($this->getFirstName())) {
            $errors['first_name'] = 'Le champ prénom est obligatoire !';
        }
        if (empty($this->getLastName())) {
            $errors['last_name'] = 'Le champ nom est obligatoire !';
        }
        if (empty($this->getPseudo())) {
            $errors['pseudo'] = 'Le champ pseudo est obligatoire !';
        } else if (BddTools::valueExists($mysql, "users", "pseudo", $this->getPseudo())) {
            $errors['pseudo'] = 'Ce pseudo est déjà utilisé !';
        }

        if (empty($this->getEmail())) {
            $errors['email'] = 'Le champ email est obligatoire !';
        } else if (!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'L\'email n\'est pas valide';
        } else if (BddTools::valueExists($mysql, "users", "email", $this->getEmail())) {
            $errors['email'] = 'Cet email est déjà utilisé !';
        }

        if (empty($this->getPassword())) {
            $errors['password'] = 'Le champ mot de passe est obligatoire !';
        } else {
            // Vérification que le mot de passe est assez fort
            // NB_CHAR_PWD dont 1 majuscule, 1 minuscule, 1 chiffre et 1 catactère spécial
            $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{'. preg_quote(NB_CHAR_PWD) .',}$/';
            if (!preg_match($regex, $this->getPassword())) {
                $errors["password"] = "Le mot de passe doit contenir au moins ". NB_CHAR_PWD ." caractères dont au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 catactère spécial !";
            }
        }
        return $errors;
    }

    /*
        Pourrait être déplacé dans une classe Security
    */
    public function verifyPassword(string $password): bool
    {
        if (password_verify($password, $this->password)) {
            return true;
        } else {
            return false;
        }
    }

    /*
        Pourrait être déplacé dans une classe Security
    */
    public static function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }


    /*
        Pourrait être déplacé dans une classe Security
    */
    public static function isUser(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user']["role"] === "user";
    }

    public static function isAdmin(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user']["role"] === "admin";
    }

    /*
        Pourrait être déplacé dans une classe Security
    */
    public static function getCurrentUserId(): int|bool
    {
        return (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id']: false;
    }

}
