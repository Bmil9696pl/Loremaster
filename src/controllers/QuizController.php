<?php

require_once __DIR__.'/../models/Question.php';
require_once __DIR__.'/../models/Session.php';

class QuizController extends AppController
{
    //private static $goodAnswers = 0;
    //private static $health = 3;
    public function question(){
        if(!$this->isPost()){
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
        $session = Session::getInstance();
        session_start();
        if($_SESSION['score'] == null){
            $_SESSION['score'] = 0;
        }
        if(isset($_POST["Right"])){
            //$session::$score += 1;
            $_SESSION['score'] += 1;
        } else{
            $session::$health -= 1;
        }
        do {
            $question = new Question();
            $tquestion = $question->getQuestion();
            $answer1 = $question->getAnswer();
            $answer2 = $question->getAnswer();
            $answer3 = $question->getAnswer();
            $answer4 = $question->getAnswer();
        }while($answer1 == $answer2 || $answer3 == $answer4 || $answer1 == $answer3 ||
        $answer1 == $answer4 || $answer2 == $answer3 || $answer2 == $answer4);
        return $this->render('question', ["question" => $tquestion, "answer1"=>$answer1,
            "answer2"=>$answer2, "answer3"=>$answer3, "answer4"=>$answer4, "score"=>$_SESSION['score']]);
    }
}