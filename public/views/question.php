<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>QUESTION</title>
</head>
<body>
    <div class="container">
        <p>
            Score: x
        </p>
        <div class = "question-container">
            <p>
                Question 1
            </p>
            <p>
                <?= $question->getQuestion() ?>
            </p>
        </div>
        <div class = "answers-container">
            <div class = "answer">
                <p><?= $question->getAnswer() ?></p>
            </div>
            <div class = "answer">
                <p><?= $question->getAnswer() ?></p>
            </div>
            <div class = "answer">
                <p><?= $question->getAnswer() ?></p>
            </div>
            <div class = "answer">
                <p><?= $question->getAnswer() ?></p>
            </div>
        </div>
    </div>
</body>