<?php

//use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController
{
    public function login(){
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render("login");
        }

        $email = $_POST["login"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render("login", ["messages" => ["This user does not exist"]]);
        }

        if($user->getEmail() !== $email){
            return $this->render("login", ["messages" => ["User with this email does not exist"]]);
        }
        if(!password_verify($password, $user->getPassword())){
            return $this->render("login", ["messages" => ["Wrong password"]]);
        }

        //return $this->render("homescreen");
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/homescreen");
    }

    public function register(){
        if(!$this->isPost()){
            return $this->render("login");
        }
        return $this->render("register");
    }
    public function registerNewUser(){
        $userRepository = new UserRepository();
        if(!$this->isPost()){
            return $this->render("login");
        }
        $email = $_POST["email"];
        $login = $_POST["login"];
        $password = $_POST["password"];

        $userRepository->addUser($email, $login, $password);
        $this->render("login", ["messeges" => ["Account created!"]]);
    }
}