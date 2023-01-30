<?php

//use modelsquestion\Question;

require_once 'AppController.php';
require_once __DIR__.'/../repository/Repository.php';
require_once __DIR__.'/../models/Question.php';
//require_once __DIR__.'/../models/Session.php';
require_once __DIR__.'/../repository/QuestionRepository.php';
require_once __DIR__.'/../repository/HighscoreRepository.php';




class DefaultController extends AppController {

    public function login(){
        $this->render('login');
    }
    public function homescreen(){
        $this->render('homescreen');
    }

    public function compareTwoUserScores($a, $b){
        return strcmp($a->getScore(), $b->getScore());
    }

    public function question(){
        Session::getInstance();
        $questionRepository = new QuestionRepository();
        $question = $questionRepository->getQuestion($_COOKIE['regionid'], $_SESSION['used'. $_COOKIE['user']]);
        if($question == null){
            $this->render("homescreen", ["messages" => ["Ten region nie został jeszcze dodany!"]]);
        }
        $_SESSION['used'][] = $question[1];
        $tquestion = $question[0]->getQuestion();
        $answer1 = $question[0]->getAnswer();
        $answer2 = $question[0]->getAnswer();
        $answer3 = $question[0]->getAnswer();
        $answer4 = $question[0]->getAnswer();
        //$answer4[0] = $temp;
        $answer4[0] = 'chujchujchujchuj';
        $this->render('question', ["question" => $tquestion, "answer1"=>$answer1,
            "answer2"=>$answer2, "answer3"=>$answer3, "answer4"=>$answer4, "score"=>0, "health"=>3]);
    }
    public function regionselect(){
        $this->render('regionselect');
    }
    public function leaderboard(){
        $highscoreRepository = new HighscoreRepository();
        $userScores = $highscoreRepository->getAllScores();
        usort($userScores, array($this, "compareTwoUserScores"));
        $userScores = array_reverse($userScores);
        $this->render('leaderboard', ['userScores'=>$userScores]);
    }
    public function register(){
        $this->render('register');
    }

    public function search(){
        #TODO
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json"){
            $content = trim(file_get_contents('php://input'));
            $decoded = json_decode($content, true);
            $highscoreRepository = new HighscoreRepository();
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($highscoreRepository->getUserScoresByUsername($decoded['search']));
        }
    }
}

?>