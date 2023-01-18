<?php

require_once __DIR__.'/../models/UserScore.php';

class HighscoreRepository extends Repository
{
    public function updateHighscore(int $idRegionu, int $score){
        switch ($idRegionu){
            case 0:
                $stmt = $this->database->connect()->prepare('
                SELECT runeterra_highscore FROM users where id = :id');
                $stmt->bindParam(":id", $_COOKIE['user'], PDO::PARAM_INT);
                $stmt->execute();
                $highscore_ID = $stmt->fetch(PDO::FETCH_ASSOC);
                if($highscore_ID['runeterra_highscore'] == null){
                    $stmt = $this->database->connect()->prepare('
                    insert into runeterra_highscore (score) values (?)');
                    $stmt->execute([$_SESSION['score']]);
                    $stmt = $this->database->connect()->prepare('
                    select id from runeterra_highscore order by id desc');
                    $stmt->execute();
                    $newID = $stmt->fetch(PDO::FETCH_ASSOC);
                    $stmt = $this->database->connect()->prepare('
                    update users set runeterra_highscore = :newID where id = :id');
                    $stmt->bindParam(":newID", $newID['id'], PDO::PARAM_INT);
                    $stmt->bindParam(":id", $_COOKIE['user'], PDO::PARAM_INT);
                    $stmt->execute();
                } else{
                    $stmt = $this->database->connect()->prepare('
                    SELECT score FROM runeterra_highscore where id = :id');
                    $stmt->bindParam(":id", $highscore_ID['runeterra_highscore'], PDO::PARAM_INT);
                    $stmt->execute();
                    $oldScore = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($_SESSION['score'] > $oldScore['score']){
                        $stmt = $this->database->connect()->prepare('
                        UPDATE runeterra_highscore set score = :score where id = :id');
                        $stmt->bindParam(":score", $score, PDO::PARAM_INT);
                        $stmt->bindParam(":id", $highscore_ID['runeterra_highscore'], PDO::PARAM_INT);
                        $stmt->execute();
                    }
                }
                break;
            case 1:
                $stmt = $this->database->connect()->prepare('
                SELECT demacia_highscore FROM users where id = :id');
                $stmt->bindParam(":id", $_COOKIE['user'], PDO::PARAM_INT);
                $stmt->execute();
                $highscore_ID = $stmt->fetch(PDO::FETCH_ASSOC);
                if($highscore_ID['demacia_highscore'] == null){
                    $stmt = $this->database->connect()->prepare('
                    insert into demacia_highscore (score) values (?)');
                    $stmt->execute([$_SESSION['score']]);
                    $stmt = $this->database->connect()->prepare('
                    select id from demacia_highscore order by id desc');
                    $stmt->execute();
                    $newID = $stmt->fetch(PDO::FETCH_ASSOC);
                    $stmt = $this->database->connect()->prepare('
                    update users set demacia_highscore = :newID where id = :id');
                    $stmt->bindParam(":newID", $newID['id'], PDO::PARAM_INT);
                    $stmt->bindParam(":id", $_COOKIE['user'], PDO::PARAM_INT);
                    $stmt->execute();
                } else{
                    $stmt = $this->database->connect()->prepare('
                    SELECT score FROM demacia_highscore where id = :id');
                    $stmt->bindParam(":id", $highscore_ID['demacia_highscore'], PDO::PARAM_INT);
                    $stmt->execute();
                    $oldScore = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($_SESSION['score'] > $oldScore['score']){
                        $stmt = $this->database->connect()->prepare('
                        UPDATE demacia_highscore set score = :score where id = :id');
                        $stmt->bindParam(":score", $score, PDO::PARAM_INT);
                        $stmt->bindParam(":id", $highscore_ID['demacia_highscore'], PDO::PARAM_INT);
                        $stmt->execute();
                    }
                }
                break;
        }
    }

    public function getAllScores(){
        $return = [];
        $stmt = $this->database->connect()->prepare('
        select username, runeterra_highscore from users');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user){
            $stmt = $this->database->connect()->prepare('
            select score from runeterra_highscore where id = :id');
            $stmt->bindParam(":id", $user["runeterra_highscore"], PDO::PARAM_INT);
            $stmt->execute();
            $score = $stmt->fetch(PDO::FETCH_ASSOC);
            $return[] = new UserScore($user["username"], $score["score"]);
        }

        return $return;
    }
}