<!DOCTYPE html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/header.css">
    <link rel="stylesheet" type="text/css" href="public/css/form.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8d0f3c8c2.js" crossorigin="anonymous"></script>
    <title>Form - naturprodt</title>
</head>

<body>
<header class="header">
    <div class="header__container">
        <div class="header__logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="mobile__logo">
            <i class="fas fa-leaf"></i>
        </div>
        <nav class="header__nav menu">
            <ul class="header__list menu_list">
                <li class="header__item menu_item"><a href="products" class="header__list_button">Products</a></li>
                <li class="header__item menu_item"><a href="recipes" class="header__list_button">Bio-recipes</a></li>
                <li class="header__item menu_item"><a href="map" class="header__list_button">Map</a></li>
            </ul>
        </nav>
        <nav class="header__nav account">
            <ul class="header__list account_list">
                <li class="header__item button">
                    <a href="account" class="account_list_button">
                        <i class="fas fa-cog"></i>
                    </a>
                </li>
                <li class="header__item button">
                    <a href="account" class="account_list_button">
                        <i class="fas fa-user-circle"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="header__menu mobile">
            <div class="dropdown__menu" style="float:right;">
                <button class="dropdown__menu button">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown__menu content">
                    <a href="products">Products</a>
                    <a href="recipes">Bio-Recipes</a>
                    <a href="map">Map</a>
                    <a href="account">Account</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="form__container">
    <form class="form__container form" action="addProduct" method="POST" ENCTYPE="multipart/form-data">
        <div class="messages" >
            <?php
            if(isset($messages)){
                foreach((array) $messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
<!--        <label for="title">Choose</label>-->
<!--        <select name="choose" id="choose">-->
<!--            <option value="product">Product</option>-->
<!--            <option value="recipe">Recipe</option>-->
<!--        </select>-->
<!--        <div>-->
<!--            <label>Choose</label>-->
<!--            <input name="choose" type="text">-->
<!--        </div>-->
        <div>
            <label>Title</label>
            <input name="title" type="text">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" type="text" rows="5"></textarea>
        </div>
        <div>
            <label>Choose image</label>
            <input type="file" name="file">
        </div>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>