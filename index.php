<?php

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);


Routing::get('', 'DefaultController');
//Routing::get('login', 'DefaultController');
Routing::get('homescreen', 'DefaultController');
//Routing::get('question', 'DefaultController');
//Routing::get('regionselect', 'DefaultController');
Routing::get('leaderboard', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post("register", 'SecurityController');
Routing::post("registerNewUser", "SecurityController");
Routing::post("question", "QuizController");
Routing::post("regionselect", "RegionselectController");


Routing::run($path);
?>