<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="Loremaster" style="display: flex;justify-content: center;">
            <img src="public/img/Loremaster.svg" style="width: 85%;">
        </div>
        <div class="logo" style="display: flex;justify-content: center;">
            <img src="public/img/313924544_1276320506540723_2182907989589946510_n 1.svg" style="width: 70%;">
        </div>
        <div class="login-container">
            <form class="login-elements" style="margin: 0;display: flex;flex-direction: column;justify-content: center;align-items: center;width: 80%;height: 80%;" action="login" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;

                        }
                    }
                    ?>
                </div>
                <p class="text" style="margin-block: auto;"> email </p>
                <input class="login" name="login" type="text" placeholder="jan.kowalski@gmail.com" style="background: #B59BAF;border: 1px solid #000000;border-radius: 50px;width: 100%;height: 120%;">
                <p class="text" style="margin-block: auto;margin-top: 3px;">Password</p>
                <input class="password" name="password" type="password" placeholder="*********" style="background: #B59BAF;border: 1px solid #000000;border-radius: 50px;width: 100%;height: 120%;">
                <button type="submit">Login</button>
            </form>
        </div>
        <form action = "register" method = "POST"><button class="register-button" type="submit">Register</button></form>
    </div>
</body>

