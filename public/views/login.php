<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>Login Page - naturprodt</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="login-container">
            <form class="login" action="login" method="post">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach((array) $messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <div class="menu buttons" >
                    <button type="submit">LOGIN</button>
                    <button onClick="javascript:window.open('./addUser', '_blank');">REGISTER</button>
                </div>
            </form>
        </div>
    </div>
</body>