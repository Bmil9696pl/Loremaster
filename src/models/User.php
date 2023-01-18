<?php

//namespace models;

class User
{
    private $id;
    private $email;
    private $password;
    private $username;

    public function __construct(int $id, string $email, string $password, string $name)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->username = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }
}