<?php

require_once __DIR__.'/../repository/QuestionRepository.php';
require_once __DIR__.'/../models/Question.php';

class RegionselectController extends AppController
{
    public function regionselect(){
        $questionRepository = new QuestionRepository();
        session_start();
        $_SESSION['used'. $_COOKIE['user']] = array();
        $_SESSION['score'. $_COOKIE['user']] = 0;
        $_SESSION['health'. $_COOKIE['user']] = 3;
        if(!$this->isPost()){
            return $this->render("regionselect");
        }

        if(isset($_POST["runeterra"])){
            setcookie('regionid', 0, time()+360, "/");
            return $this->renderQuestions($questionRepository);
        }
        if(isset($_POST["demacia"])){
            setcookie('regionid', 1, time()+360, "/");;
            return $this->renderQuestions($questionRepository);
        }
        if(isset($_POST["noxus"])){
            setcookie('regionid', 2, time()+360, "/");;
            return $this->renderQuestions($questionRepository);
        }
        if(isset($_POST["freljord"])){
            setcookie('regionid', 3, time()+360, "/");;
            return $this->renderQuestions($questionRepository);
        }
        if(isset($_POST["ionia"])){
            setcookie('regionid', 4, time()+360, "/");;
            return $this->renderQuestions($questionRepository);
        }
        if(isset($_POST["piltzaun"])){
            setcookie('regionid', 5, time()+360, "/");;
            return $this->renderQuestions($questionRepository);
        }
        if(isset($_POST["shurima"])){
            setcookie('regionid', 6, time()+360, "/");;
            return $this->renderQuestions($questionRepository);
        }
        if(isset($_POST["targon"])){
            setcookie('regionid', 7, time()+360, "/");;
            return $this->renderQuestions($questionRepository);
        }
        if(isset($_POST["shadowisles"])){
            setcookie('regionid', 8, time()+360, "/");;
            return $this->renderQuestions($questionRepository);
        }
    }

    /**
     * @param QuestionRepository $questionRepository
     * @return null
     */
    public function renderQuestions(QuestionRepository $questionRepository)
    {
        $question = $questionRepository->getQuestion($_COOKIE['regionid'], $_SESSION['used'. $_COOKIE['user']]);
        if ($question == null) {
            $this->render("homescreen", ["messages" => ["Ten region nie został jeszcze dodany!"]]);
        }
        $_SESSION['used'][] = $question[1];
        $tquestion = $question[0]->getQuestion();
        $answer1 = $question[0]->getAnswer();
        $answer2 = $question[0]->getAnswer();
        $answer3 = $question[0]->getAnswer();
        $answer4 = $question[0]->getAnswer();
        $_SESSION['used'][] = $question[1];
        return $this->render('question', ["question" => $tquestion, "answer1" => $answer1,
            "answer2" => $answer2, "answer3" => $answer3, "answer4" => $answer4, "score" => 0, "health" => 3]);
    }
}