<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LEADERBOARD</title>
</head>
<body>
    <div class="container">
        <p class="stext">Leaders:</p>
        <div class="select-container" style="width: 25vw;">
            <form style="padding-top: 10px;padding-bottom: 10px;">
                <?php $n = 1; ?>
                <?php foreach ($userScores as $userScore): ?>
            <div class="leaderboard-user">
                <p class="text"><?= $n; ?></p>
                <p class="text"><?= $userScore->getUsername(); ?></p>
                <p class="text"><?= $userScore->getScore(); ?></p>
            </div>
            <?php $n++; ?>
            <?php endforeach; ?>
            </form>
        </div>
    </div>
</body>