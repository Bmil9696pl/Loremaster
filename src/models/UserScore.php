<?php

class UserScore
{
    public $username;
    public $score;

    public function __construct($username, $score)
    {
        $this->username = $username;
        $this->score = $score;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getScore()
    {
        return $this->score;
    }
}