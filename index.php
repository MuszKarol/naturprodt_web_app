<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('products', 'DefaultController');
Routing::get('account', 'DefaultController');
Routing::get('form', 'DefaultController');
Routing::get('map', 'DefaultController');
Routing::get('recipes', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::run($path);

