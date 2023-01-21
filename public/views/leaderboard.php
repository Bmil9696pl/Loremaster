<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>LEADERBOARD</title>
</head>
<body>
    <div class="container">
        <p class="stext">Leaders:</p>
        <div class="select-container" style="width: 25vw;">
            <div class="search-bar">
                <input placeholder="wyszukaj użytkowników" style="display: flex;flex-direction: row;background: #FFE6FF;border-radius: 50px;width: 20vw;">
            </div>
            <section class="leaders">
                <form style="padding-top: 10px;padding-bottom: 10px;">
                    <?php foreach ($userScores as $userScore): ?>
                        <div class="leaderboard-user">
                            <p class="text username"><?= $userScore->getUsername(); ?></p>
                            <p class="text score"><?= $userScore->getScore(); ?></p>
                        </div>
                    <?php endforeach; ?>
                </form>
            </section>
        </div>
    </div>
</body>

<template id="leader-template">
    <div class="leaderboard-user">
        <p class="text username">username</p>
        <p class="text score">score</p>
    </div>
</template>