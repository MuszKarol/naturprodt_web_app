<!DOCTYPE html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/header.css">
    <link rel="stylesheet" type="text/css" href="public/css/products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8d0f3c8c2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/searchProducts.js" defer></script>
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>
    <script type="text/javascript" src="./public/js/copyToClipboard.js" defer></script>
    <title>Products - naturprodt</title>
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
            <button class="header__button add__project"  onClick="javascript:window.open('./productForm', '_blank');">
                <i class="fas fa-plus"></i>
                Add
            </button>
            <div class="header search__bar">
                    <input placeholder="search products">
            </div>
        </div>
    </header>
    
    <div class="products">
        <div class="products__container">
            <?php foreach ($products as $product): ?>
            <div id="<?= $product->getId(); ?>">
                <div class="product product__overview">
                    <h2><?= $product->getTitle(); ?></h2>
                    <p><?= $product->getDescription(); ?></p>
                </div>
                <img src="public/uploads/<?= $product->getImage(); ?>">
                <div class="product social__section">
                    <ul class="product__list social__list">
                        <li class="social__item icon">
                            <a>
                                <i class="fas fa-heart"><?= $product->getLike(); ?></i>
                            </a>
                        <li class="social__item icon">
                            <a>
                                <i class="fas fa-minus-square"><?= $product->getDislike(); ?></i>
                            </a>
                        <li class="social__item icon">
                            <a id="test2" onclick="javascript:window.open('<?= $product->getLink(); ?>', '_blank');">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        <li class="social__item icon">
                            <a onclick="javascript:copyToClipboard('<?= $product->getLink(); ?>');">
                                <i class="fas fa-share-alt"></i>
                            </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

<template id="product-template">
    <div id="">
        <div class="product product__overview">
            <h2></h2>
            <p></p>
        </div>
        <img src="">
        <div class="product social__section">
            <ul class="product__list social__list">
                <li class="social__item icon">
                    <a>
                        <i class="fas fa-heart"></i>
                    </a>
                <li class="social__item icon">
                    <a>
                        <i class="fas fa-minus-square"></i>
                    </a>
                <li class="social__item icon">
                    <a id="shop">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                <li class="social__item icon">
                    <a id="copy">
                        <i class="fas fa-share-alt"></i>
                    </a>
        </div>
    </div>
</template>

</html>