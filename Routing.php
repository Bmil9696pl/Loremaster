<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once "src/controllers/QuizController.php";


class Routing {
    public static $routes;

    public static function get($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function run($url){
        $action = explode("/", $url)[0];
        if(!array_key_exists($action, self::$routes)) {
            die("wrong url");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: "login";

        $object->$action();
    }
}

?>