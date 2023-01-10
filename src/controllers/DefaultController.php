<?php

//use modelsquestion\Question;

require_once 'AppController.php';
require_once __DIR__.'/../models/Question.php';
require_once __DIR__.'/../models/Session.php';


class DefaultController extends AppController {

    public function login(){
        $this->render('login');
    }
    public function homescreen(){
        $this->render('homescreen');
    }
    public function question(){
        Session::getInstance();
        $question = new Question();
        $tquestion = $question->getQuestion();
        $answer1 = $question->getAnswer();
        $answer2 = $question->getAnswer();
        $answer3 = $question->getAnswer();
        $answer4 = $question->getAnswer();
        $this->render('question', ["question" => $tquestion, "answer1"=>$answer1,
            "answer2"=>$answer2, "answer3"=>$answer3, "answer4"=>$answer4, "score"=>0]);
    }
    public function regionselect(){
        $this->render('regionselect');
    }
    public function leaderboard(){
        $this->render('leaderboard');
    }
    public function register(){
        $this->render('register');
    }
}

?>