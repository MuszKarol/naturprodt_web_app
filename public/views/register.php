<!DOCTYPE html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8d0f3c8c2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Register - naturprodt</title>
</head>
<body>
    <div class="form__container">
        <form id='form' class="form__container form" action="addUser" method="POST" ENCTYPE="multipart/form-data">
            <div class="messages" >
                <?php
                if(isset($messages))
                {
                    foreach((array) $messages as $message)
                    {
                        echo $message;
                    }
                }
                ?>
            </div>
            <div>
                <label for="title">Name</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Surname</label>
                <input type="text" name="surname">
            </div>
            <div>
                <label>Email</label>
                <input id='email' type="text" name="email">
            </div>
            <div>
                <label>Password</label>
                <input id='pass' type="password">
            </div>
            <div>
                <label>Confirm password</label>
                <input id='confirm_pass' type="password" name="password">
            </div>
            <input type="submit" value="Submit" onclick="window.close();">
        </form>
    </div>
</body>
</html>