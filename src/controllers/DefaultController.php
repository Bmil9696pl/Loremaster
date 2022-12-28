<?php

//use modelsquestion\Question;

require_once 'AppController.php';
require_once __DIR__.'/../models/Question.php';

class DefaultController extends AppController {

    public function login(){
        $this->render('login');
    }
    public function homescreen(){
        $this->render('homescreen');
    }
    public function question(){
        $question = new Question();
        $this->render('question', ["question" => $question]);
    }
    public function regionselect(){
        $this->render('regionselect');
    }
    public function leaderboard(){
        $this->render('leaderboard');
    }
}

?>