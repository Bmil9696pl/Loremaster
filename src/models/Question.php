<?php

//namespace models;

class Question
{
    private $question;
    private $answers;

    public function __construct()
    {
        $this->question = "Iorem ipsum";
        $this->answers = array("AAAAAAAAAAAA","BBBBBBBBBBB","CCCCCCCCCCCC","DDDDDDDDDDD");
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
        while($return == null) {
            $n = rand(0, count($this->answers));
            $return = $this->answers[$n];
            //unset($this->answers[$n]);
        }
        array_splice($this->answers, $n, $n);
        return $return;
    }
}