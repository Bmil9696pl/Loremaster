<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>HOMESCREEN</title>
</head>
<body>
    <div class="container">
        <div class="Loremaster" style="display: flex;justify-content: center;margin-block-end: 60px;">
            <img src="public/img/Loremaster.svg" style="width: 85%;">
        </div>
        <?php
        if(isset($messages)){
            foreach ($messages as $message){
                echo $message;

            }
        }
        ?>
        <div class="menu">
            <form class = "menu-buttons" style="margin: 0;display: flex;flex-direction: column;justify-content: center;align-items: center;width: 80%;height: 70%;">
                <a href="regionselect">Start</a>
                <a href="leaderboard">Stats</a>
                <a href="leaderboard">Leaderboard</a>
                <a href="login">Logout</a>
            </form>
        </div>
    </div>
</body>
