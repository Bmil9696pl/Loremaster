<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function login(){
        $this->render('login');
    }
    public function homescreen(){
        $this->render('homescreen');
    }
    public function question(){
        $this->render('question');
    }
    public function regionselect(){
        $this->render('regionselect');
    }
    public function leaderboard(){
        $this->render('leaderboard');
    }
}

?>