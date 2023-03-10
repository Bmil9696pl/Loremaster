<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
            ');
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();



        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        return new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['username']
        );
    }

    public function addUser(string $email, string $username, string $password){
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO users (username, email, password, created_at)
        VALUES (?,?,?,?)
        ');
        $stmt->execute(
            [
                $username,
                $email,
                password_hash($password, PASSWORD_BCRYPT),
                $date->format("Y-m-d")
            ]
        );
    }
}