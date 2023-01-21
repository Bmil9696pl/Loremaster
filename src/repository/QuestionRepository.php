<?php

require_once __DIR__.'/../models/Question.php';

class QuestionRepository extends Repository
{
    public function getQuestion(int $id, $used){
        //$stmt = $this->database->connect()->prepare('SELECT COUNT (id) FROM quiz WHERE region = :id');
        //$stmt->bindParam(":id", $id, PDO::PARAM_STR);
        //$stmt->execute();
        //$loop_boundary = $stmt->fetch(PDO::FETCH_ASSOC);
        $loop_boundary = 50;

        $n_of_iterations = 0;
        do {
            $n_of_iterations += 1;
            if($id != 0) {
                $stmt = $this->database->connect()->prepare('
                    SELECT id, question, right_answer, wrong_answer, wrong_answer2, wrong_answer3 FROM quiz WHERE region = :id ORDER BY random()
                ');
                $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            }else{
                $stmt = $this->database->connect()->prepare('
                    SELECT id, question, right_answer, wrong_answer, wrong_answer2, wrong_answer3 from quiz ORDER BY random();
                ');
            }
            $stmt->execute();

            $question = $stmt->fetch(PDO::FETCH_ASSOC);

            if($n_of_iterations == $loop_boundary){
                return null;
            }
        }while(in_array($question['id'], $_SESSION['used'. $_COOKIE['user']]));
        if($question == null){
            return null;
        }
        $ret = new Question();
        //$question['wrong_answer'] = $id;
        $ret->setAll($question['question'], $question['right_answer'], $question['wrong_answer'], $question['wrong_answer2'], $question['wrong_answer3']);

        return [$ret, $question['id']];
    }
}