<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT u.email, u.password,  ud.name, ud.surname 
            FROM public.users u
            JOIN users_details ud on ud.id = u.id_user_details
            WHERE email = :email;
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if($user == false){
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function addUser(User $user): void
    {
        $stmtUD = $this->database->connect()->prepare('
            INSERT INTO users_details(name, surname)
            VALUES (?, ?);
        ');

        $stmtUD->execute([
            $user->getName(),
            $user->getSurname()
        ]);

        $id = $this->getUserDetailsId($user->getName(), $user->getSurname());

        $stmtU = $this->database->connect()->prepare('
            INSERT INTO users(email, password, enabled, salt, id_user_details)
            VALUES (?, ?, ?, ?, ?);
        ');

        $enabled = 1;
        $salt = 1;

        $stmtU->execute([
            $user->getEmail(),
            $user->getPassword(),
            $enabled,
            $salt,
            $id
        ]);
    }


    public function getUserDetailsId(string $name, string $surname): int {
        $stmt = $this->database->connect()->prepare('
            SELECT ud.id
            FROM users_details ud
            WHERE name = :name AND surname = :surname
            ORDER BY id DESC
            LIMIT 1;
        ');

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data['id'];
    }

}