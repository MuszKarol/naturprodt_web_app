<?php

require_once __DIR__.'/../../Database.php';

class Repository
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    protected function getIdUser(string $email): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT users.id
            FROM users 
            WHERE email = :email
            LIMIT 1;
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data['id'];
    }

}