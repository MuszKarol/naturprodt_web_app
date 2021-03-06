<!DOCTYPE html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/header.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8d0f3c8c2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/searchRecipes.js" defer></script>
    <title>Bio-Recipes - naturprodt</title>
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
        <div class="management__container">
           <button class="header__button add__project"  onClick="javascript:window.open('./recipeForm', '_blank');">
                <i class="fas fa-plus"></i>
                Add
            </button>
            <div class="header search__bar">
                    <input placeholder="search products">
            </div>
        </div>
    </header>
    <section class="recipes">
        <div class="recipes__container">
            <?php foreach ($recipes as $recipe): ?>
            <div>
                <img src="public/uploads/<?= $recipe->getImage(); ?>">
                <div class="recipe recipe__overview">
                    <h2><?= $recipe->getTitle(); ?></h2>
                    <div class="recipe__overview text">
                        <p><?= $recipe->getRecipe(); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>

<template id="recipe-template">
    <div id="">
        <img src="">
        <div class="recipe recipe__overview">
            <h2></h2>
            <div class="recipe__overview text">
                <p></p>
            </div>
        </div>
    </div>
</template>

</html>