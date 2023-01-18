<?php

//namespace models;

class Question
{
    private $question;
    private $answers;

    public function __construct()
    {
        $this->question = "Iorem ipsum";
        $this->answers = array(
            array("AAAAAAAAAAAA", "Right"),
            array("BBBBBBBBBBB", "Wrong"),
            array("CCCCCCCCCCCC", "Wrong"),
            array("DDDDDDDDDDD", "Wrong"));
    }

    public function setAll(string $question, string $right_answer, string $wrong_answer, string $wrong_answer2, string $wrong_answer3){
        $this->question = $question;
        $this->answers = array(
            array($right_answer, "Right"),
            array($wrong_answer, "Wrong"),
            array($wrong_answer2, "Wrong"),
            array($wrong_answer3, "Wrong")
        );
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }


    /**
     * @return mixed
     */
    public function getAnswer()
    {
        $return = null;
        $n = 0;
        while($return == null){
            $n = rand(0, count($this->answers));
            $return = $this->answers[$n];
        }
        array_splice($this->answers, $n, $n);
        return $return;
    }
}