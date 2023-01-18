<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>QUESTION</title>
</head>
<?php
$r_id = $id;
echo $r_id;
?>
<body>
    <div class="container">
        <p>
            Score: <?= $score ?>
        </p>
        <p>
            Health: <?= $health ?>
        </p>
        <div class = "question-container">
            <p>
                Question 1
            </p>
            <p>
                <?=
                $question;
                ?>
            </p>
        </div>
        <form class = "answers-container" action="question" method="POST">
            <button class = "answer" type="submit" name="<?= $answer1[1] ?>">
                <p><?= $answer1[0] ?></p>
            </button>
            <button class = "answer" type="submit" name="<?= $answer2[1] ?>">
                <p><?= $answer2[0] ?></p>
            </button>
            <button class = "answer" type="submit" name="<?= $answer3[1] ?>">
                <p><?= $answer3[0] ?></p>
            </button>
            <button class = "answer" type="submit" name="<?= $answer4[1] ?>">
                <p><?= $answer4[0] ?></p>
            </button>
        </form>
    </div>
</body>