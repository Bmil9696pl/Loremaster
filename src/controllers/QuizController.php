<?php

require_once __DIR__.'/../models/Question.php';
require_once __DIR__.'/../models/Session.php';
require_once __DIR__.'/../repository/QuestionRepository.php';
require_once __DIR__.'/../repository/HighscoreRepository.php';


class QuizController extends AppController
{
    //private static $goodAnswers = 0;
    //private static $health = 3;
    public function question(){
        $questionRepository = new QuestionRepository();
        session_start();
        if(!isset($_SESSION['used'])){
            $_SESSION['used'] = array();
        }
        if(!$this->isPost()){
            //Session::getInstance();
            //$temp = unserialize($_COOKIE['used']);
            //var_dump($temp);
            $question = $questionRepository->getQuestion($_COOKIE['regionid'], $_SESSION['used']);
            if($question == null){
                $this->render("homescreen", ["messages" => ["Ten region nie został jeszcze dodany!"]]);
            }
            $_SESSION['used'][] = $question[1];
            $tquestion = $question[0]->getQuestion();
            $answer1 = $question[0]->getAnswer();
            $answer2 = $question[0]->getAnswer();
            $answer3 = $question[0]->getAnswer();
            $answer4 = $question[0]->getAnswer();
            return $this->render('question', ["question" => $tquestion, "answer1"=>$answer1,
                "answer2"=>$answer2, "answer3"=>$answer3, "answer4"=>$answer4, "score"=>0]);
        }
        //$session = Session::getInstance();
        if($_SESSION['score'] == null){
            $_SESSION['score'] = 0;
        }
        if($_SESSION['health'] == null){
            $_SESSION['health'] = 3;
        }
        if(isset($_POST["Right"])){
            //$session::$score += 1;
            $_SESSION['score'] += 1;
        } else{
            $_SESSION['health'] -= 1;
            if($_SESSION['health'] == 0){
                $highscoreRepository = new HighscoreRepository();
                $highscoreRepository->updateHighscore($_COOKIE['regionid'], $_SESSION['score']);
                return $this->render("homescreen", ["messages" => ["Twój wynik: " . $_SESSION['score']]]);
            }
        }
        do {
            //$temp = unserialize($_COOKIE['used']);
            $question = $questionRepository->getQuestion($_COOKIE['regionid'], $_SESSION['used']);
            if($question == null){
                $highscoreRepository = new HighscoreRepository();
                $highscoreRepository->updateHighscore($_COOKIE['regionid'], $_SESSION['score']);
                return $this->render("homescreen", ["messages" => ["Twój wynik: " . $_SESSION['score']]]);
            }else {
                $tquestion = $question[0]->getQuestion();
                $answer1 = $question[0]->getAnswer();
                $answer2 = $question[0]->getAnswer();
                $answer3 = $question[0]->getAnswer();
                $answer4 = $question[0]->getAnswer();
            }
        }while($answer1 == $answer2 || $answer3 == $answer4 || $answer1 == $answer3 ||
        $answer1 == $answer4 || $answer2 == $answer3 || $answer2 == $answer4);
        $_SESSION['used'][] = $question[1];
        //$answer4 = $_COOKIE['user'];
        return $this->render('question', ["question" => $tquestion, "answer1"=>$answer1,
            "answer2"=>$answer2, "answer3"=>$answer3, "answer4"=>$answer4, "score"=>$_SESSION['score'],
            "health"=>$_SESSION['health']]);
    }
}