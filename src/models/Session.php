<?php

class Session
{
    private static $session;
    public static $score;
    public static $health;

    private function __construct(){
        self::$health = 3;
        self::$score = 0;
    }

    public static function getInstance(){
        if(!isset(self::$session)){
            self::$session = new Session();
        }
        return self::$session;
    }
}