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